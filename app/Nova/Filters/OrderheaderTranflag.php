<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class OrderheaderTranflag extends Filter
{
    public $name = 'สถานะการจัดส่ง';
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('tranflag', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'รับสินค้าไว้' => '1',
            'อยู่ระหว่างจัดส่ง' => '2',
            'รถบรรทุกจัดส่งแล้ว' => '3',
            'ลงไว้สาขา' => '4',
            'สาขาจัดส่งแล้ว' => '5',
            'รับเองที่สาขา' => '6',
        ];
    }
}
