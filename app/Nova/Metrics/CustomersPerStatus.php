<?php

namespace App\Nova\Metrics;

use App\Customer;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class CustomersPerStatus extends Partition
{
    public function name()
    {
        return __('Customers status');
    }
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, Customer::class, 'customer_status');
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
        return 'customers-per-status';
    }
}
