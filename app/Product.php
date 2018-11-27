<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\UnicodeSlug;


class Product extends Model
{
    use UnicodeSlug;

    const STICKER_TYPE = 'sticker';
    const SHIRT_TYPE = 'shirt';
    const MUG_TYPE = 'mug';
    const HAT_TYPE = 'hat';
    const SOCK_TYPE = 'sock';

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    const ARCHIVED_STATUS = 'archived';
    const COMING_SOON_STATUS = 'coming-soon';
    const SOLD_OUT_STATUS = 'sold-out';

    protected $fillable = [
        'type',
        'status',
        'title',
        'description',
        'preview_image_url',
        'price',
        'cost'

    ];

    protected $cast = [
        'price' => 'integer',
        'cost' => 'integer'
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {

            $model->uuid = (string)Str::uuid();

            $slug = parent::makeSlug($model->title);

            if (static::whereSlug($slug)->exists()) {
                $slug = "{$slug}-" . $model->id;
            }

            $model->slug = $slug;

        });
    }

    public static function statuses()
    {
        return [
            self::ACTIVE_STATUS => self::ACTIVE_STATUS,
            self::INACTIVE_STATUS => self::INACTIVE_STATUS,
            self::ARCHIVED_STATUS => self::ARCHIVED_STATUS,
            self::COMING_SOON_STATUS => self::COMING_SOON_STATUS,
            self::SOLD_OUT_STATUS => self::SOLD_OUT_STATUS,
        ];
    }

    public static function types()
    {
        return [
            self::STICKER_TYPE => self::STICKER_TYPE,
            self::SHIRT_TYPE => self::SHIRT_TYPE,
            self::MUG_TYPE => self::MUG_TYPE,
            self::HAT_TYPE => self::HAT_TYPE,
            self::SOCK_TYPE => self::SOCK_TYPE,

        ];
    }

    public function inventory()
    {
        return $this->hasMany('App\Inventory');

    }


    //dynamic scope
    public function scopeAvailable($query)
    {
        return $query->where('status', self::ACTIVE_STATUS)
            ->orWhere('status', self::COMING_SOON_STATUS)
            ->orWhere('status', self::SOLD_OUT_STATUS);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
