<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perday extends Model
{
    protected $fillable=[
           'PlotNo','Items','Quantity','Date','Price'
   ];
}
