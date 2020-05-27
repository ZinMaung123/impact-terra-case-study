<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes;

    protected $table = "markets";

    protected $fillable = [
        "name", "description"
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
