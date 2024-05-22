<?php

namespace App\DataTables;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Service $service) {
                return view('dashboard.admin.services.btn.actions', compact('service'));
            })
            ->editColumn('status', function (Service $service) {
                return $service->statusWithLabel();
            })
            ->editColumn('created_at', function (Service $service) {
                return $service->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function (Service $service) {
                return $service->created_at->format('Y-m-d');
            })
            ->rawColumns(['action', 'status', 'created_at', 'updated_at']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Service $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */

    public function html() {
        return $this->builder()
            ->setTableId('service-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'        => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 'جميع السجلات']],
                'buttons'    => [
                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => 'طباعه'],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => 'تصدير كـ CSV'],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => 'تصدير كـ EXCEL'],
                    ['extend' => 'reload', 'className' => 'btn btn-dark', 'text' => 'تحديث'],

                ],
                'initComplete' => " function () {
		            this.api().columns([1]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }",

                'language'         => [
					'sProcessing'     => trans('datatable.sProcessing'),
					'sLengthMenu'     => trans('datatable.sLengthMenu'),
					'sZeroRecords'    => trans('datatable.sZeroRecords'),
					'sEmptyTable'     => trans('datatable.sEmptyTable'),
					'sInfo'           => trans('datatable.sInfo'),
					'sInfoEmpty'      => trans('datatable.sInfoEmpty'),
					'sInfoFiltered'   => trans('datatable.sInfoFiltered'),
					'sInfoPostFix'    => trans('datatable.sInfoPostFix'),
					'sSearch'         => trans('datatable.sSearch'),
					'sUrl'            => trans('datatable.sUrl'),
					'sInfoThousands'  => trans('datatable.sInfoThousands'),
					'sLoadingRecords' => trans('datatable.sLoadingRecords'),
					'oPaginate'       => [
						'sFirst'         => trans('datatable.sFirst'),
						'sLast'          => trans('datatable.sLast'),
						'sNext'          => trans('datatable.sNext'),
						'sPrevious'      => trans('datatable.sPrevious'),
					],
					'oAria'            => [
						'sSortAscending'  => trans('datatable.sSortAscending'),
						'sSortDescending' => trans('datatable.sSortDescending'),
					],
				],
			]);

    }

    /**
     * Get the dataTable columns definition.
     */
    protected function getColumns() {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#','searchable' => false,],
            ['name' => 'name', 'data' => 'name', 'title' => 'الخدمه',],
            ['name' => 'notes', 'data' => 'notes', 'title' => 'ملاحظات',],
            ['name' => 'status', 'data' => 'status', 'title' => 'الحاله', 'orderable' => false, 'searchable' => false,],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'اضافه فى', 'orderable' => false, 'searchable' => false,],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'محدث فى', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'الاجرائات', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Service_' . date('YmdHis');
    }
}