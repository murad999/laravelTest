<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public $timestamps = true;
    protected $guarded = ['id'];
}
