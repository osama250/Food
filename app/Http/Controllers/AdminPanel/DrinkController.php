<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\Drinks\CreateDrinkRequest;
use App\Http\Requests\AdminPanel\Drinks\UpdateDrinkRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DrinkRepository;
use Illuminate\Http\Request;

class DrinkController extends AppBaseController
{

    private $drinkRepository;

    public function __construct(DrinkRepository $drinkRepo)
    {
        $this->drinkRepository = $drinkRepo;
        $this->middleware('permission:View Drink', ['only' => ['index', 'store'] ] );
        $this->middleware('permission:Create Drink', ['only' => ['create', 'store'] ] );
        $this->middleware('permission:Update Drink', ['only' => ['edit', 'update'] ] );
        $this->middleware('permission:Delete Drink', ['only' => ['destroy'] ] );
    }

    public function index(Request $request)
    {
        $drinks = $this->drinkRepository->all();
        return view('AdminPanel.drinks.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.drinks.create');
    }

    public function store(CreateDrinkRequest $request)
    {
        $input = $request->all();
        $drink = $this->drinkRepository->create($input);
        return redirect(route('drinks.index'))->with('success', __('lang.created'));
    }

    // public function show($id)
    // {
    //     $drink = $this->drinkRepository->find($id);
    //     if (empty($drink)) {
    //         return redirect(route('drinks.index'));
    //     }
    //     return view('AdminPanel.drinks.show')->with('drink', $drink);
    // }


    public function edit($id)
    {
        $drink = $this->drinkRepository->find($id);
        if (empty($drink)) {
            return redirect(route('drinks.index'));
        }
        return view('AdminPanel.drinks.edit' , get_defined_vars() );
    }

    public function update($id, UpdateDrinkRequest $request)
    {
        $drink = $this->drinkRepository->find($id);
        if (empty($drink)) {
            return redirect(route('drinks.index'));
        }
        $drink = $this->drinkRepository->update($request->all(), $id);
        return redirect( route('drinks.index') )->with( 'success', __('lang.updated') );
    }

    public function destroy($id)
    {
        $drink = $this->drinkRepository->find($id);
        if (empty($drink)) {
            return redirect(route('drinks.index'));
        }
        $this->drinkRepository->delete($id);
        return redirect(route('drinks.index'))->with('success', __('lang.deleted') );
    }
}
