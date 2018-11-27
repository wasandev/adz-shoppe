<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    const XS_SIZE = 'xs';
    const S_SIZE = 's';
    const M_SIZE = 'm';
    const L_SIZE = 'l';
    const XL_SIZE = 'xl';
    const XXL_SIZE = 'xxl';


    protected $fillable = [
        'product_id',
        'size',
        'color'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {

            $model->sku = $model->generateSku($model);

        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public static function sizes()
    {
        return [
            self::XS_SIZE => self::XS_SIZE,
            self::S_SIZE => self::S_SIZE,
            self::M_SIZE => self::M_SIZE,
            self::L_SIZE => self::L_SIZE,
            self::XL_SIZE => self::XL_SIZE,
            self::XXL_SIZE => self::XXL_SIZE,

        ];
    }
    protected function generateSku($model)
    {
        return $model->product_id . '-' . $model->color . '-' . $model->size;
    }
}
