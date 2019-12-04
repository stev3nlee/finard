<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Faq_category;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function view()
    {
        $data = Faq_category::all();
        return view('vendor.backpack.base.faq_category.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.faq_category.create');
    }
    public function edit($id)
    {
        $data = Faq_category::find($id);
        return view('vendor.backpack.base.faq_category.edit', [
            'data' => $data,
        ]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:faq_category',
        ]);

        $table = new Faq_category;
        $table->name = $request->input('name');
        $table->save();

        $request->session()->flash('insert', 'Success');
        return redirect()->route('faq_category_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:faq_category,name,'.$request->input('id'),
        ]);

        $table = Faq_category::find($request->input('id'));
        $table->name = $request->input('name');
        $table->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('faq_category_view');
    }
    public function delete($id, Request $request)
    {
        $table = Faq_category::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('faq_category_view');
    }

    public function status($id,$status){
        $table = Faq_category::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('faq_category_view');
    }
}
