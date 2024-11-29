<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suggestion;
class SuggestionController extends Controller
{

    public function index()
    {
        $suggestions = Suggestion::all();
        return view('AdminPanel.suggestions.index' , get_defined_vars());
    }

    public function destroy($id)
    {
        $suggestion = Suggestion::find($id);
        if (empty($suggestion)) {
            return redirect(route('suggestions.index'));
        }
        $suggestion->delete();
        return redirect(route('suggestions.index'))->with('success', __('lang.deleted'));
    }
}
