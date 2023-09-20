<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relacion uno a muchos a traves
    public function events() {
        return $this->hasManyThrough(Event::class, Subcategory::class);
    }

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }
}