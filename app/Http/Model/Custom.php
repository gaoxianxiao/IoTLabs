<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $table = 'custom';
    protected $primaryKey = 'custom_id';
    public $timestamps = false;
    protected $guarded = [];
}
