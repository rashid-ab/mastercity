<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable=['plot','client_name','payment_recieve','donation','feedback','reason','total_payment','date'];
}
