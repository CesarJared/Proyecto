<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;

class SaleController extends Controller
{
    public function saleInfo()
    {
        $sales = Sales::all();
        return view('admin.sales-table')->with('sales',$sales);
    }

    public function insertInfo(Request $request){
        $validate = $request->validate([
            'code' => 'required',
            'sale' => 'required'
        ],[
            'code.required' => 'code is required',
            'sale.required' => 'sale is required'
        ]);

        $sale = new Sales();
        $sale->code = $request->code;
        $sale->sale = $request->sale;
        $sale->save();
        return redirect('/admin/sales');
    }

    public function editInfo(Request $request, $id){
        $validate = $request->validate([
            'code' => 'required',
            'sale' => 'required'
        ],[
            'code.required' => 'code is required',
            'sale.required' => 'sale is required'
        ]);

        $sale = Sales::find($id);

        if($sale != null){
            $sale->code = $request->code;
            $sale->sale = $request->sale;
            $sale->save();
        }
        return redirect('/admin/sales');
    }

    public function deleteInfo($id){
        $sale = Sales::find($id);
        if($sale != null){
            $sale->delete();
        }
        return redirect('/admin/sales');
    }
}
