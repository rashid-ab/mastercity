<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable=[
           'PlotNo','Items','Quantity','Date','Price'
   ];
}
