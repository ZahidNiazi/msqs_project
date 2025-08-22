<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name', 'subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function mcqs()
    {
        return $this->hasMany(Mcq::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Access category through subcategory
    public function getCategoryAttribute()
    {
        return $this->subcategory->category ?? null;
    }
}
