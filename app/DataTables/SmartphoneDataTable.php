<?php

namespace App\DataTables;

use App\Model\Smartphone as ModelSmartphone;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SmartphoneDataTable extends DataTable
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
            ->addColumn('action', function ($s) {
                return view('restrito.datatable.acoes_padrao', [
                    'editar' => route('restrito.smartphones.edit', $s),
                    'excluir' => route('restrito.smartphones.destroy', $s)
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Smartphone $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ModelSmartphone $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('smartphone-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')
                            ->addClass('btn btn-primary')
                            ->text('<i class="fas fa-plus-circle"></i> Create new'),
                        Button::make('export')
                            ->addClass('btn btn-primary')
                            ->text('<i class="fas fa-download"></i> Export'),
                        Button::make('print')
                            ->addClass('btn btn-primary')
                            ->text('<i class="fas fa-print"></i> Print')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')
                  ->title('Actions'),
            Column::make('id'),
            Column::make('model'),
            Column::make('name'),
            Column::make('imei'),
            Column::make('sn')
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Smartphone_' . date('YmdHis');
    }
}
