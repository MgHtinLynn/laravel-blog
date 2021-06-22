<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 19/06/2021
 * Time: 20:15
 */

namespace App\Helpers;

use Webpatser\Uuid\Uuid;

trait Uuids
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()} = (string) Uuid::generate(4);
        });
    }
}
