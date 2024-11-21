<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryDetails( $id )
    {
        $category = Category::with('meals')->findOrFail($id);
        return response()->json([
            'status'   => true ,
            'category' => $category ,
        ] , 200 );
    }
}
