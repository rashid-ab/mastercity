<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable=['name','PlotNo','Items','Quantity','Date','Price'];
}
