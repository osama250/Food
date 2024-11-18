<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\Rice\CreateRiceRequest;
use App\Http\Requests\AdminPanel\Rice\UpdateRiceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RiceRepository;
use Illuminate\Http\Request;
use Flash;

class RiceController extends AppBaseController
{
    private $riceRepository;
    public function __construct(RiceRepository $riceRepo)
    {
        $this->riceRepository = $riceRepo;
        $this->middleware('permission:View Rice', ['only' => ['index', 'store']]);
        $this->middleware('permission:Create Rice', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update Rice', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Rice', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $rices = $this->riceRepository->all();
        return view('AdminPanel.rice.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.rice.create');
    }

    public function store(CreateRiceRequest $request)
    {
        $input = $request->all();
        // return $input;
        $rice  = $this->riceRepository->create($input);
        return redirect(route('rice.index'))->with('success', __('lang.created'));
    }

    // public function show($id)
    // {
    //     $rice = $this->riceRepository->find($id);
    //     if (empty($rice)) {
    //         return redirect(route('rice.index'));
    //     }
    //     return view('rice.show')->with('rice', $rice);
    // }

    public function edit($id)
    {
        $rice = $this->riceRepository->find($id);
        if (empty($rice)) {
            return redirect(route('rice.index'));
        }
        return view('AdminPanel.rice.edit' , get_defined_vars() );
    }

    public function update($id, UpdateRiceRequest $request)
    {
        $rice = $this->riceRepository->find($id);
        if (empty($rice)) {
            return redirect(route('rice.index'));
        }
        $rice = $this->riceRepository->update($request->all(), $id);
        return redirect( route('rice.index') )->with('success', __('lang.updated') );
    }

    public function destroy($id)
    {
        $rice = $this->riceRepository->find($id);
        if (empty($rice)) {
            return redirect(route('rice.index'));
        }
        $this->riceRepository->delete($id);
        return redirect( route('rice.index') )->with('success', __('lang.deleted') );
    }
}
