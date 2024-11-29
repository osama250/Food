<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dietplan;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function index() {
        $diets = Dietplan::all();
        return response()->json([
            'saccess' => true,
            'diets'   => $diets
        ] , 200 );
    }
}
