<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Topic;

class AjaxController extends Controller
{


public function getSubcategories($categoryId)
{
    return Subcategory::where('category_id', $categoryId)->get();
}

public function getTopics($subcategoryId)
{
    return Topic::where('subcategory_id', $subcategoryId)->get();
}
}
