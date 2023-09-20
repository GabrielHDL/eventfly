<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    const DRAFT = 1;
    const PUBLISHED = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getStockAttribute(){

        return $this->quantity;
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
