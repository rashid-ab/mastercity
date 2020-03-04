<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable=['client_name','PlotNo','Items','Quantity','Date','credit','debit','balance'];
}
