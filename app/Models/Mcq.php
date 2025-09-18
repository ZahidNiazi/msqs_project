<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
