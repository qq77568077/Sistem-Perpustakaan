<?php

namespace App\DataTables;

use App\Models\jilidLaporan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class jilidLaporanDataTable extends DataTable
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
            ->addIndexColumn('')
            ->addColumn('action', function ($row) {
                $action = '';

                if(Gate::allows('update layanan/jilidLaporan')){
                    $action =  '<button type="button" data-id='.$row->id.' data-jenis="edit" class="btn btn-warning btn-sm action"><i class="ti-pencil"></i></button>';
                }
                if(Gate::allows('delete layanan/jilidLaporan')){
                    $action .=  ' <button type="button" data-id='.$row->id.' data-jenis="delete" class="btn btn-danger btn-sm action"><i class="ti-trash"></i></button>';
                }

                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\jilidLaporan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(jilidLaporan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('jilidlaporan-table')
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
            Column::make('nama'),
            Column::make('page_berwarna'),
            Column::make('page_hitamPutih'),
            Column::make('exemplar'),
            Column::make('total'),
            Column::make('bukti_pembayaran'),
            Column::make('file'),
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
        return 'jilidLaporan_' . date('YmdHis');
    }
}
