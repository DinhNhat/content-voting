<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function __invoke()
    {
        $listCategories = CategoryResource::collection(Category::all());

        return response()->json([
            'success' => true,
            'message' => 'Get the list of categories',
            'data' => $listCategories
        ], 200);
    }
}
