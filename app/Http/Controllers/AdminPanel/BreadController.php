<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\Bred\CreateBreadRequest;
use App\Http\Requests\AdminPanel\Bred\UpdateBreadRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BreadRepository;
use Illuminate\Http\Request;


class BreadController extends AppBaseController
{
    private $breadRepository;
    public function __construct(BreadRepository $breadRepo)
    {
        $this->breadRepository = $breadRepo;
        $this->middleware('permission:View Bread', ['only' => ['index', 'store'] ] );
        $this->middleware('permission:Create Bread', ['only' => ['create', 'store'] ] );
        $this->middleware('permission:Update Bread', ['only' => ['edit', 'update'] ] );
        $this->middleware('permission:Delete Bread', ['only' => ['destroy'] ] );
    }

    public function index(Request $request)
    {
        $breads = $this->breadRepository->all();
        return view('AdminPanel.breads.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.breads.create');
    }

    public function store(CreateBreadRequest $request)
    {
        $input = $request->all();
        $bread = $this->breadRepository->create($input);
        return redirect( route('breads.index') )->with('success', __('lang.created') );
    }

    // public function show($id)
    // {
    //     $bread = $this->breadRepository->find($id);
    //     if (empty($bread)) {
    //         return redirect(route('breads.index'));
    //     }
    //     return view('breads.show')->with('bread', $bread);
    // }

    public function edit($id)
    {
        $bread = $this->breadRepository->find($id);
        if (empty($bread)) {
            return redirect(route('breads.index'));
        }
        return view('AdminPanel.breads.edit' , get_defined_vars() );
    }

    public function update($id, UpdateBreadRequest $request)
    {
        $bread = $this->breadRepository->find($id);
        if (empty($bread)) {
            return redirect(route('breads.index'));
        }
        $bread = $this->breadRepository->update($request->all(), $id);
        return redirect(route('breads.index'))->with('success', __('lang.updated') );
    }

    public function destroy($id)
    {
        $bread = $this->breadRepository->find($id);
        if (empty($bread)) {
            return redirect(route('breads.index'));
        }
        $this->breadRepository->delete($id);
        return redirect(route('breads.index'))->with('success', __('lang.deleted') );
    }
}
