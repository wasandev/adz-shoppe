<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Car extends Resource
{
    public static $group = 'ข้อมูลเกี่ยวกับรถ';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Car';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'car_registe';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'car_registe'
    ];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'ข้อมูลรถ';
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
            Text::make('ทะเบียนรถ', 'car_registe')
                ->rules('required')
                ->sortable(),
            Text::make('รหัสเจ้าของ', 'owner_code')
                ->sortable(),
            BelongsTo::make('เจ้าของรถ', 'owner', 'App\Nova\Owner'),
            Boolean::make('ใช้งาน', 'car_flag')
                ->trueValue('U')
                ->falseValue('N'),
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
