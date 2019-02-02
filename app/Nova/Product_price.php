<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class Product_price extends Resource
{
    public static $group = 'ข้อมูลสินค้าและราคาขนส่ง';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Product_price';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'product_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'product_code',
        'product_name',
    ];
    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'ราคาค่าขนส่ง';
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
            Text::make('รหัสสินค้า', 'product_code')->sortable()->hideFromIndex(),
            Text::make('ชื่อสินค้า', 'product_name')->sortable(),
            BelongsTo::make('สินค้า', 'product', 'App\Nova\Product')->hideFromIndex(),
            BelongsTo::make('จังหวัด', 'province', 'App\Nova\Province'),
            BelongsTo::make('อำเภอ', 'amphur', 'App\Nova\Amphur'),
            BelongsTo::make('หน่วยนับ', 'unit', 'App\Nova\Unit'),
            Number::make('ค่าขนส่ง', 'price_b')->sortable(),
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


        return [
            new Filters\Product_priceProvince,
            //new Filters\Product_priceAmphur,
            new Filters\Product_priceUnit,

        ];
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
