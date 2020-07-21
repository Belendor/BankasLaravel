<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function accountPictures()
    {
        return $this->hasMany('App\Picture', 'account_id', 'id');
    }
}
