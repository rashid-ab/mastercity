<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    protected $fillable=[
      'Plot','Category','Block','Name'
    ];
}
