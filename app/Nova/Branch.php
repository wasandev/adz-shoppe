<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;


class Branch extends Resource
{
    public static $group = 'ข้อมูลเบื้องต้น';


    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Branch';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'branch_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'branch_code',
        'branch_name',
    ];
    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'ข้อมูลสาขา';
    }
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('รหัสสาขา', 'branch_code')
                ->rules('required')
                ->sortable(),
            Text::make('ชื่อสาขา', 'branch_name')
                ->rules('required')
                ->sortable(),
            Text::make('ที่อยู่', 'branch_add')
                ->rules('required')
                ->sortable()
                ->hideFromIndex(),
            Text::make('โทรศัพท์', 'branch_tel')
                ->rules('required')
                ->sortable(),
            Text::make('โทรสาร', 'branch_fax')
                ->rules('required')
                ->sortable()
                ->hideFromIndex(),
            HasMany::make('พื้นที่บริการ', 'branch_zone', Branch_zone::class),
            HasMany::make('พนักงาน', 'employee', Employee::class),
            HasMany::make('รายการส่งของสาขา', 'order_header', Order_header::class),
            HasMany::make('รายการรับของสาขา', 'order_header_rec', Order_header::class),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
