<?php

namespace App\DataTables;

use App\Models\city;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class citiesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('country.name', function ($model) {
                if (app()->getLocale() == 'en')
                    return $model->country->name_en;
                else
                    return $model->country->name_ar;
            })
            ->addColumn('active', 'admin.cities.Datatables.active')
            ->addColumn('action', 'admin.cities.Datatables.action')
            ->rawColumns([
                'active',
                'action'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\city $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(city $model)
    {
        return $model->newQuery()->with(['country']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('cities-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);
//                    ->buttons(
//                        Button::make('create'),
//                        Button::make('export'),
//                        Button::make('print'),
//                        Button::make('reset'),
//                        Button::make('reload')
//                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name_en')->title(__('translations.City Name English')),
            Column::make('name_ar')->title(__('translations.City Name Arabic')),
            Column::make('country_id')->title(__('translations.Country Name'))->data('country.name'),
            Column::make('active')->title(__('translations.Active')),
            Column::make('action')->title(__('translations.Actions')),
//            Column::computed('action')
//                  ->exportable(false)
//                  ->printable(false)
//                  ->width(60)
//                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cities_' . date('YmdHis');
    }
}
