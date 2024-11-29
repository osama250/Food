<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientMeal;

class OrderController extends Controller
{

    public function index()
    {
        $orders = ClientMeal::with('meal')->get();
        return view('AdminPanel.orders.index' , get_defined_vars());
    }

    public function destroy($id)
    {
        $order = ClientMeal::find($id);
        if (empty($order)) {
            return redirect(route('orders.index'));
        }
        $order->delete();
        return redirect(route('orders.index'))->with('success', __('lang.deleted'));
    }
}
