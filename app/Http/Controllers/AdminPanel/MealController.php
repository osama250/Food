<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\Meals\CreateMealRequest;
use App\Http\Requests\AdminPanel\Meals\UpdateMealRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Category;
use App\Models\Rice;
use App\Models\Bread;
use App\Models\Drink;
use App\Models\Salad;
use App\Repositories\MealRepository;
use Illuminate\Http\Request;

class MealController extends AppBaseController
{
    private $mealRepository;

    public function __construct(MealRepository $mealRepo)
    {
        $this->mealRepository = $mealRepo;
        $this->middleware('permission:View Meal', ['only' => ['index', 'store'] ] );
        $this->middleware('permission:Create Meal', ['only' => ['create', 'store'] ] );
        $this->middleware('permission:Update Meal', ['only' => ['edit', 'update'] ] );
        $this->middleware('permission:Delete Meal', ['only' => ['destroy'] ] );
    }

    public function index(Request $request)
    {
        $meals = $this->mealRepository->all();
        return view('AdminPanel.meals.index' , get_defined_vars() );
    }

    public function create()
    {
        $categories = Category::all();
        $rices      = Rice::all();
        $breads    = Bread::all();
        $drinks     = Drink::all();
        $salads     = Salad::all();
        return view('AdminPanel.meals.create' , get_defined_vars() );
    }

    public function store( CreateMealRequest $request)
    {
        $input = $request->all();
        $meal  = $this->mealRepository->create($input);
        return redirect(route('meals.index'));
    }

    // public function show($id)
    // {
    //     $meal = $this->mealRepository->find($id);
    //     if (empty($meal)) {
    //         return redirect(route('meals.index'));
    //     }
    //     return view('meals.show' , get_defined_vars() );
    // }

    public function edit($id)
    {
        $rices          = Rice::all();
        $breads         = Bread::all();
        $drinks         = Drink::all();
        $salads         = Salad::all();
        $categories     = Category::all();
        $meal = $this->mealRepository->find($id);
        if (empty($meal)) {
            return redirect(route('meals.index'));
        }

        return view('AdminPanel.meals.edit' , get_defined_vars() );
    }

    public function update($id, UpdateMealRequest $request)
    {
        $meal = $this->mealRepository->find($id);
        if (empty($meal)) {
            return redirect(route('meals.index'));
        }
        $meal = $this->mealRepository->update($request->all(), $id);
        return redirect( route('meals.index') )->with('success', __('lang.updated') );
    }

    public function destroy($id)
    {
        $meal = $this->mealRepository->find($id);
        if (empty($meal)) {
            return redirect(route('meals.index'));
        }
        $this->mealRepository->delete($id);
        return redirect(route('meals.index'));
    }
}
