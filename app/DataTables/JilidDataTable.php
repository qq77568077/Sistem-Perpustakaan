<?php

namespace App\DataTables;

use App\Models\Jilid;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JilidDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('jenis_pengumpulan', function ($row) {
                // Menggunakan relasi untuk mengakses data pengumpulan
                return optional($row->pengumpulan)->nama;
            })
            ->addIndexColumn('')
            ->addColumn('action', function ($row) {
                $action = '';

                // if (Gate::allows('update layanan/jilid')) {
                //     $action =  '<button type="button" data-id=' . $row->id . ' data-jenis="edit" class="btn btn-warning btn-sm action"><i class="ti-pencil"></i></button>';
                // }
                // if (Gate::allows('delete layanan/jilid')) {
                //     $action .=  ' <button type="button" data-id=' . $row->id . ' data-jenis="delete" class="btn btn-danger btn-sm action"><i class="ti-trash"></i></button>';
                // }

                if (Gate::allows('detail layanan/jilid')) {
                    $action .=  ' <button type="button" data-id=' . $row->id . ' data-jenis="detail" class="btn btn-info btn-sm action"><i class="ti-eye"></i></button>';
                }

                return $action;
            });
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Jilid $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Jilid $model): QueryBuilder
    {
        $loggedInUserId = Auth::id();
        return $model->select(['id', 'user_id', 'jenis_pengumpulan', 'bukti_pembayaran', 'keterangan', 'status', 'created_at', 'updated_at'])
            ->where('user_id', $loggedInUserId);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jilid-table')
            ->parameters(['searchDelay' => 1000])
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('created_at')->title('Tanggal Pengajuan'),
            Column::make('jenis_pengumpulan'),
            Column::make('bukti_pembayaran')->title('Bukti Pembayaran'), // Ensure proper title is set
            Column::make('keterangan'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Jilid_' . date('YmdHis');
    }
}
