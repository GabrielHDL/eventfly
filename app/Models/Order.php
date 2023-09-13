<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDING = 1;
    const PAID = 2;
    const NULLED = 3;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
