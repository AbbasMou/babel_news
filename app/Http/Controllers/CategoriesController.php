<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;

class CategoriesController extends Controller
{
public function getCategories(){
    $categories=NewsCategory::all();
    return response()->json($categories);
}
}
