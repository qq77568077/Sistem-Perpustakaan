<?php

namespace App\DataTables;

use App\Models\Document;
use App\Models\File;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Gate;

class DocumentDataTable extends DataTable
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
            ->editColumn('user_id', function ($row) {
                return $row->user ? $row->user->name : 'No User';
            })
            ->addIndexColumn('')
            ->addColumn('action', function ($row) {
                $action = '';


                if (Gate::allows('update layanan/file')) {
                    $action =  '<button type="button" data-id=' . $row->id . ' data-jenis="edit" class="btn btn-warning btn-sm action"><i class="ti-pencil"></i></button>';
                }

                if (Gate::allows('delete layanan/file')) {
                    $action .=  ' <button type="button" data-id=' . $row->id . ' data-jenis="delete" class="btn btn-danger btn-sm action"><i class="ti-trash"></i></button>';
                }

                if (Gate::allows('detail layanan/file')) {
                    $action .=  ' <button type="button" data-id=' . $row->id . ' data-jenis="detail" class="btn btn-info btn-sm action"><i class="ti-eye"></i></button>';
                }

                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Document $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(File $model): QueryBuilder
    {
        return $model->select('user_id', DB::raw('MAX(id) AS id'))
            ->groupBy('user_id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('document-table')
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
            Column::make('user_id')->title('Nama Mahasiswa'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
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
        return 'Document_' . date('YmdHis');
    }
}
