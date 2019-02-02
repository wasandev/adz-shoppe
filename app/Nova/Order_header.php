<?php

namespace App\Nova;

use Laravel\Nova\Resource as NovaResource;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;



class Order_header extends Resource
{
    public static $group = 'ข้อมูลลูกค้า/ใบรับส่ง';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Order_header';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'order_header_no';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'order_header_no',
        'order_date',
        'customer_code',
        'customer_recive_code',
        'branch_rec',
        'branch_code',
        'car_registe'
    ];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'ใบรับส่งสินค้า';
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
            Text::make('เลขที่ใบรับส่ง', 'order_header_no')->sortable(),
            DateTime::make('วันที่ใบรับส่ง', 'order_header_date')->sortable(),
            Text::make('สาขาต้นทาง', 'branch_code')->hideFromIndex(),
            Text::make('สาขาปลายทาง', 'branch_rec')->hideFromIndex(),
            Text::make('รหัสผู้ส่ง', 'customer_code')->hideFromIndex(),
            BelongsTo::make('ผู้ส่งสินค้า', 'customer', 'App\Nova\Customer')->hideFromIndex(),
            Text::make('รหัสผู้รับ', 'customer_recive_code')->hideFromIndex(),
            BelongsTo::make('ผู้รับสินค้า', 'customer_recieve', 'App\Nova\Customer')->hideFromIndex(),
            Currency::make('ค่าขนส่ง', 'orderamount')->format('%i'),
            Text::make('ทะเบียนรถ', 'car_registe')->sortable(),
            Select::make('สถานะสินค้า', 'tranflag')->options([
                '1' => 'รับสินค้าไว้',
                '2' => 'อยู่ระหว่างจัดส่ง',
                '3' => 'รถบรรทุกจัดส่งแล้ว',
                '4' => 'ลงไว้สาขา',
                '5' => 'สาขาจัดส่งแล้ว',
                '6' => 'รับเองที่สาขา',
            ])->displayUsingLabels(),
            Boolean::make('สถานะเอกสาร', 'order_header_cancel_flag')
                ->trueValue('N')
                ->falseValue('Y')->sortable()->onlyOnIndex(),
            Select::make('สถานะเอกสาร', 'order_header_cancel_flag')->options([
                'N' => 'ปกติ',
                'Y' => 'ยกเลิก',
            ])->displayUsingLabels()->hideFromIndex(),
            Select::make('การชำระเงิน', 'order_header_bill_flag')->options([
                'F' => 'วางบิลต้นทาง',
                'L' => 'วางบิลปลายทาง',
                'H' => 'เงินสดต้นทาง',
                'E' => 'เงินสดปลายทาง'
            ])->displayUsingLabels()->hideFromIndex(),
            DateTime::make('วันที่เวลาบันทึกล่าสุด', 'systime')->onlyOnDetail(),
            HasMany::make('รายการสินค้า', 'order_detail', Order_detail::class),

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

            (new Metrics\OrderamountPerMonth)->width('full')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            (new Metrics\Order_headersPerDay)->width('1/3')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            (new Metrics\OrderamountPerDay)->width('1/3')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            (new Metrics\OrderheadersPerPaytype)->width('1/3')
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
            new Filters\OrderCancelflag,
            new Filters\OrderheaderBillflag,
            new Filters\OrderheaderBranchrec,
            new Filters\OrderheaderDate,
            new Filters\OrderheaderTranflag,


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

    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->role == 'admin' or $request->user()->role == 'employee') {
            return $query;
        } else {
            return $query->where('customer_code', $request->user()->customer_code)
                ->orWhere('customer_recive_code', $request->user()->customer_code);
        }


    }
}
