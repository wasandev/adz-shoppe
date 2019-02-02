<?php

namespace App\Nova\Metrics;

use App\Order_header;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class OrderheadersPerPaytype extends Partition
{
  public function name()
  {
    return __('Orders Payment Type');
  }
  /**
   * Calculate the value of the metric.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return mixed
   */
  public function calculate(Request $request)
  {
    return $this->count($request, Order_header::class, 'order_header_bill_flag');
  }

  /**
   * Determine for how many minutes the metric should be cached.
   *
   * @return  \DateTimeInterface|\DateInterval|float|int
   */
  public function cacheFor()
  {
        // return now()->addMinutes(5);
  }

  /**
   * Get the URI key for the metric.
   *
   * @return string
   */
  public function uriKey()
  {
    return 'orderheaders-per-paytype';
  }
}
