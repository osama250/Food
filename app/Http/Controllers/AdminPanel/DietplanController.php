<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\Dietplan\CreateDietplanRequest;
use App\Http\Requests\AdminPanel\Dietplan\UpdateDietplanRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DietplanRepository;
use Illuminate\Http\Request;
use Flash;

class DietplanController extends AppBaseController
{

    private $dietplanRepository;

    public function __construct(DietplanRepository $dietplanRepo)
    {
        $this->dietplanRepository = $dietplanRepo;
        $this->middleware('permission:View Dietplan', ['only' => ['index', 'store'] ] );
        $this->middleware('permission:Create Dietplan', ['only' => ['create', 'store'] ] );
        $this->middleware('permission:Update Dietplan', ['only' => ['edit', 'update'] ] );
        $this->middleware('permission:Delete Dietplan', ['only' => ['destroy'] ] );
    }

    public function index(Request $request)
    {
        $dietplans = $this->dietplanRepository->all();
        return view('AdminPanel.dietplans.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.dietplans.create');
    }


    public function store(CreateDietplanRequest $request)
    {
        // dd( $request->all() );
        $input      = $request->all();
        $dietplan   = $this->dietplanRepository->create($input);
        return redirect(route('dietplans.index'))->with('success', __('lang.created'));
    }

    // public function show($id)
    // {
    //     $dietplan = $this->dietplanRepository->find($id);
    //     if (empty($dietplan)) {
    //         return redirect(route('dietplans.index'));
    //     }
    //     return view('dietplans.show')->with('dietplan', $dietplan);
    // }

    public function edit($id)
    {
        $dietplan = $this->dietplanRepository->find($id);
        if (empty($dietplan)) {
            return redirect(route('dietplans.index'));
        }
        return view('AdminPanel.dietplans.edit' , get_defined_vars() );
    }


    public function update($id, UpdateDietplanRequest $request)
    {
        $dietplan = $this->dietplanRepository->find($id);
        if (empty($dietplan)) {
            return redirect(route('dietplans.index'));
        }
        $dietplan = $this->dietplanRepository->update($request->all(), $id);
        return redirect(route('dietplans.index'))->with('success', __('lang.updated'));
    }

    public function destroy($id)
    {
        $dietplan = $this->dietplanRepository->find($id);
        if (empty($dietplan)) {
            return redirect(route('dietplans.index'));
        }
        $this->dietplanRepository->delete($id);
        return redirect(route('dietplans.index'))->with('success', __('lang.deleted'));
    }
}
