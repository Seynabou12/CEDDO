<?php

namespace App\Models\Trait;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

trait HasUuid
{
    /**
     * @param string $uuid
     * @return Model|null
     */
    public static function findByUuid(string $uuid): ?Model
    {
        return self::where('uuid', $uuid)->first();
    }

    /**
     * @return void
     */
    protected static function bootHasUuid()
    {
        static::created(function ($model) {

            if (Schema::hasColumn($model->getTable(), "uuid")) {
                $model->uuid = Str::uuid();
                $model->save();
            }
        });
    }
}
