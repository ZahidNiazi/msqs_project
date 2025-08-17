<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [

        'name','title','description','file'

    ];
    public $timestamps = true;

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function brands(){
        return $this->hasMany(Brand::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the MCQs that belong to the category.
     */
    public function mcqs()
    {
        return $this->hasMany(Mcq::class);
    }
}
