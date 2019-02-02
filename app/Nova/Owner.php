<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Boolean;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Owner extends Resource
{
    public static $group = 'ข้อมูลเกี่ยวกับรถ';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Owner';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'owner_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'owner_name'
    ];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'ข้อมูลเจ้าของรถ';
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
            Text::make('รหัส', 'owner_code')
                ->rules('required')
                ->sortable(),
            Text::make('ชื่อเจ้าของ', 'owner_name')
                ->rules('required')
                ->sortable(),
            Text::make('ที่อยู่', 'owner_add1')
                ->hideFromIndex(),
            Text::make('โทรศัพท์', 'owner_phone'),
            Text::make('มือถือ', 'owner_mobile'),
            Boolean::make('ใช้งาน', 'owner_use_flag')
                ->trueValue('U')
                ->falseValue('N'),
            Text::make('หมายเหตุ', 'owner_remark')
                ->hideFromIndex(),
            Text::make('เลขที่บัตรประชาชน', 'owner_idcard')
                ->hideFromIndex(),
            Text::make('เลขที่ผู้เสียภาษี', 'owner_taxid')
                ->hideFromIndex(),
            Text::make('เลขที่บัญชีธนาคาร', 'owner_accno')
                ->hideFromIndex(),
            Text::make('ชื่อบัญชีธนาคาร', 'owner_accname')
                ->hideFromIndex(),
            Text::make('ธนาคาร', 'owner_bank')
                ->hideFromIndex(),
            Text::make('สาขาธนาคาร', 'owner_bankbrn')
                ->hideFromIndex(),
            Text::make('กำหนดจ่าย', 'owner_paydate')
                ->hideFromIndex(),
            HasMany::make('รถบรรทุก', 'car', Car::class),
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
