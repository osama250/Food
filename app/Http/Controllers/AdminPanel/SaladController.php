<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\Salad\CreateSaladRequest;
use App\Http\Requests\AdminPanel\Salad\UpdateSaladRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SaladRepository;
use Illuminate\Http\Request;

class SaladController extends AppBaseController
{

    private $saladRepository;

    public function __construct(SaladRepository $saladRepo)
    {
        $this->saladRepository = $saladRepo;
        $this->middleware('permission:View Salad', ['only' => ['index', 'store']]);
        $this->middleware('permission:Create Salad', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update Salad', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Salad', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $salads = $this->saladRepository->all();
        return view('AdminPanel.salads.index' , get_defined_vars());
    }

    public function create()
    {
        return view('AdminPanel.salads.create');
    }

    public function store(CreateSaladRequest $request)
    {
        $input = $request->all();
        $salad = $this->saladRepository->create($input);
        return redirect(route('salads.index'))->with('success', __('lang.created'));
    }


    public function show($id)
    {
        $salad = $this->saladRepository->find($id);

        if (empty($salad)) {
            return redirect(route('salads.index'));
        }

        return view('salads.show')->with('salad', $salad);
    }

    public function edit($id)
    {
        $salad = $this->saladRepository->find($id);
        if (empty($salad)) {
            return redirect(route('salads.index'));
        }
        return view('AdminPanel.salads.edit' , get_defined_vars() );
    }

    public function update($id, UpdateSaladRequest $request)
    {
        $salad = $this->saladRepository->find($id);
        if (empty($salad)) {
            return redirect(route('salads.index'));
        }
        $salad = $this->saladRepository->update($request->all(), $id);
        return redirect(route('salads.index'))->with('success', __('lang.updated'));
    }

    public function destroy($id)
    {
        $salad = $this->saladRepository->find($id);
        if (empty($salad)) {
            return redirect(route('salads.index'));
        }
        $this->saladRepository->delete($id);
        return redirect(route('salads.index'))->with('success', __('lang.deleted'));
    }
}
