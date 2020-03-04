<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perday extends Model
{
    protected $fillable=[
           'PlotNo','cd_id','Items','Quantity','Date','Price'
   ];
}
