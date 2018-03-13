<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function my_buyer()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
