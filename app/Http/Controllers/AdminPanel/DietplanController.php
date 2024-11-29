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
    }


    public function index(Request $request)
    {
        $dietplans = $this->dietplanRepository->paginate(10);

        return view('dietplans.index')
            ->with('dietplans', $dietplans);
    }


    public function create()
    {
        return view('dietplans.create');
    }


    public function store(CreateDietplanRequest $request)
    {
        $input = $request->all();

        $dietplan = $this->dietplanRepository->create($input);

        Flash::success('Dietplan saved successfully.');

        return redirect(route('dietplans.index'));
    }

    public function show($id)
    {
        $dietplan = $this->dietplanRepository->find($id);

        if (empty($dietplan)) {
            Flash::error('Dietplan not found');

            return redirect(route('dietplans.index'));
        }

        return view('dietplans.show')->with('dietplan', $dietplan);
    }

    public function edit($id)
    {
        $dietplan = $this->dietplanRepository->find($id);

        if (empty($dietplan)) {
            Flash::error('Dietplan not found');

            return redirect(route('dietplans.index'));
        }

        return view('dietplans.edit')->with('dietplan', $dietplan);
    }


    public function update($id, UpdateDietplanRequest $request)
    {
        $dietplan = $this->dietplanRepository->find($id);

        if (empty($dietplan)) {
            Flash::error('Dietplan not found');

            return redirect(route('dietplans.index'));
        }

        $dietplan = $this->dietplanRepository->update($request->all(), $id);

        Flash::success('Dietplan updated successfully.');

        return redirect(route('dietplans.index'));
    }

    public function destroy($id)
    {
        $dietplan = $this->dietplanRepository->find($id);

        if (empty($dietplan)) {
            Flash::error('Dietplan not found');

            return redirect(route('dietplans.index'));
        }

        $this->dietplanRepository->delete($id);

        Flash::success('Dietplan deleted successfully.');

        return redirect(route('dietplans.index'));
    }
}
