<?php

namespace App\DataTables;

use App\Models\SubSubCategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class sub_sub_categoriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $category_id = $this->category_id;
        $sub_category_id = $this->sub_category_id;
//        $id = $this->id;
        return datatables()
            ->eloquent($query)
//            ->addColumn('action', function() use ($category_id, $sub_category_id){
//                return view('admin.sub_sub_categories.Datatables.action', compact('category_id', 'sub_category_id'));
//            })
            ->addColumn('action', function($row) use ($category_id){
                return view('admin.sub_sub_categories.Datatables.action', compact('row','category_id'));
            })
            ->rawColumns([
                'action'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\sub_sub_category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubSubCategory $model)
    {
        return $model->newQuery()->where('sub_category_id', $this->sub_category_id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('sub_sub_categories-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('sub_sub_category_name_en')->title(__('translations.Sub Sub Category Name English')),
            Column::make('sub_sub_category_name_ar')->title(__('translations.Sub Sub Category Name Arabic')),
            Column::make('action')->title(__('translations.Actions')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sub_sub_categories_' . date('YmdHis');
    }
}
