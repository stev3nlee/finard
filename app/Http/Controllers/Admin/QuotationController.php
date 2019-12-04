<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function view()
    {
        $data = Quotation::orderby('id','desc')->get();
        return view('vendor.backpack.base.quotation.list', ['data' => $data]);
    }

    public function detail($id)
    {
        $data = Quotation::find($id);
        return view('vendor.backpack.base.quotation.detail', ['data' => $data]);
    }

    public function delete($id, Request $request)
    {
        $table = Quotation::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('quotation_view');
    }
}
