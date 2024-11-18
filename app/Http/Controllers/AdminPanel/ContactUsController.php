<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:View Contact-Us|Create Contact-Us|Update Contact-Us|Delete Contact-Us', ['only' => ['index', 'store']]);
        $this->middleware('permission:Create Contact-Us', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update Contact-Us', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Contact-Us', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contacts = ContactUs::all();
        return view('AdminPanel.contacts.index', get_defined_vars());
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('error_message', __('lang.deleted'));
    }
}
