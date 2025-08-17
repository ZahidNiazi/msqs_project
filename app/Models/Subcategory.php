<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','name']; // add more fields if needed


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the MCQs for the subcategory.
     */
    public function mcqs()
    {
        return $this->hasMany(Mcq::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
