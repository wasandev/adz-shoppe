<?php

namespace App\Nova;

use Laravel\Nova\Resource as NovaResource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Panel;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\HasMany;

class Customer extends Resource
{
    public static $group = 'ข้อมูลลูกค้า/ใบรับส่ง';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Customer';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'customer_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'customer_code',
        'customer_name'
    ];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'ข้อมูลลูกค้า';
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
            Text::make('รหัสลูกค้า', 'customer_code')->sortable(),

            Text::make('ชื่อลูกค้า', function () {
                return $this->customer_title . ' ' . $this->customer_name;
            }),
            Text::make('โทรศัพท์', 'customer_phone'),
            Text::make('มือถือ', 'mobilephone')->hideFromIndex(),
            Select::make('การชำระเงิน', 'ar_flag')->options([
                'Y' => 'วางบิล',
                'H' => 'สดต้นทาง',
                'E' => 'สดปลายทาง',
            ])->hideFromIndex()->displayUsingLabels(),

            Boolean::make('สถานะ', 'customer_status')
                ->trueValue('U')
                ->falseValue('N')->onlyOnIndex(),
            Select::make('สถานะ', 'customer_status')->options([
                'U' => 'ปกติ',
                'C' => 'ยกเลิกการให้เครดิด',
                'N' => 'ไม่ใช้งาน',
            ])->hideFromIndex()->displayUsingLabels(),
            new Panel('ที่อยู่', $this->addressFields()),

            /* HasMany::make('รายการส่งสินค้า', 'order_header', Order_header::class)
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin' or $request->user()->role == 'employee';
                }),
            HasMany::make('รายการรับสินค้า', 'order_header_rec', Order_header::class)
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin' or $request->user()->role == 'employee';
                }),
         */
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
        return [
            (new Metrics\CustomersPerDay)->width('1/3')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            (new Metrics\NewCustomers)->width('1/3')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            (new Metrics\CustomersPerStatus)->width('1/3')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
        ];
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
            new Filters\CustomerArflag,
            new Filters\CustomerStatus,
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

    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function addressFields()
    {
        return [
            Place::make('ที่อยู่', 'customer_addr1')->hideFromIndex(),
            Text::make('ที่อยู่ 2', 'customer_addr2')->hideFromIndex(),
            BelongsTo::make('ตำบล/แขวง', 'tambol', 'App\Nova\Tambol')->hideFromIndex(),
            BelongsTo::make('อำเภอ/เขต', 'amphur', 'App\Nova\Amphur')->hideFromIndex(),
            BelongsTo::make('จังหวัด', 'province', 'App\Nova\Province')->hideFromIndex(),
            Text::make('รหัสไปรษณีย์', 'customer_postcode')->hideFromIndex(),

        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->role == 'admin' or $request->user()->role == 'employee') {
            return $query;
        } else {
            return $query->where('customer_code', $request->user()->customer_code);
        }


    }
}
