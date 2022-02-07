<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as UuidGenerator;

trait Uuid
{
    public static function boot()
    {
        parent::boot();
        static::creating(function (Model $model) {
            $model->id = UuidGenerator::uuid4()->toString();
        });
    }
}
