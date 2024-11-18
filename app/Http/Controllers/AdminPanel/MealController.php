<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AAdminPanel\Meals\CreateMealRequest;
use App\Http\Requests\AAdminPanel\Meals\UpdateMealRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MealRepository;
use Illuminate\Http\Request;
use Flash;

class MealController extends AppBaseController
{

    private $mealRepository;

    public function __construct(MealRepository $mealRepo)
    {
        $this->mealRepository = $mealRepo;
        $this->middleware('auth');
        $this->middleware('permission:View Meals', ['only' => ['index', 'store'] ] );
        $this->middleware('permission:Create Meals', ['only' => ['create', 'store'] ] );
        $this->middleware('permission:Update Meals', ['only' => ['edit', 'update'] ] );
        $this->middleware('permission:Delete Meals', ['only' => ['destroy'] ] );
    }

    public function index(Request $request)
    {
        $meals = $this->mealRepository->all();
        return view('AAdminPanel.meals.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AAdminPanel.meals.create');
    }

    public function store( CreateMealRequest $request)
    {
        $input = $request->all();
        $meal = $this->mealRepository->create($input);
        return redirect(route('meals.index'));
    }

    /**
     * Display the specified Meal.
     */
    public function show($id)
    {
        $meal = $this->mealRepository->find($id);
        if (empty($meal)) {
            return redirect(route('meals.index'));
        }
        return view('meals.show')->with('meal', $meal);
    }

    public function edit($id)
    {
        $meal = $this->mealRepository->find($id);
        if (empty($meal)) {
            return redirect(route('meals.index'));
        }

        return view('meals.edit')->with('meal', $meal);
    }

    public function update($id, UpdateMealRequest $request)
    {
        $meal = $this->mealRepository->find($id);
        if (empty($meal)) {
            return redirect(route('meals.index'));
        }
        $meal = $this->mealRepository->update($request->all(), $id);
        return redirect(route('meals.index'));
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
