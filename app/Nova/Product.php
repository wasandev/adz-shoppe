<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;



class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Product';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
        'type',
        'status',
    ];

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
            Text::make('Title')
                ->rules('required')
                ->sortable(),
            Text::make('Image Url', 'preview_image_url')
                ->onlyOnForms()
                ->rules('url'),

            Select::make('Status')
                ->options(\App\Product::statuses())
                ->rules('required')
                ->sortable(),
            Select::make('Type')
                ->options(\App\Product::types())
                ->rules('required')
                ->sortable(),
            Number::make('Price($)', function () {
                return money_format('%.2n', $this->price / 100);
            })->exceptOnForms(),

            Number::make('Cost($)', function () {
                return money_format('%.2n', $this->cost / 100);
            })->exceptOnForms(),

            Number::make('Price (Cents)', 'price')
                ->min(100)
                ->max(10000000)
                ->step(1)
                ->onlyOnForms(),
            Number::make('Cost (Cents', 'cost')
                ->min(100)
                ->max(10000000)
                ->step(1)
                ->onlyOnForms(),
            Textarea::make('Description'),
            HasMany::make('Inventory', 'Inventory', Inventory::class),



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
