<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Faq_category;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function view()
    {
        $data = Faq::all();
        return view('vendor.backpack.base.faq.list', ['data' => $data]);
    }
    public function create()
    {
        $category = Faq_category::get();
        return view('vendor.backpack.base.faq.create', ['category' => $category]);
    }
    public function edit($id)
    {
        $data = Faq::find($id);
        $category = Faq_category::get();
        return view('vendor.backpack.base.faq.edit', [
            'data' => $data,
            'category' => $category,
        ]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
        ]);

        $table = new Faq;
        $table->question = $request->input('question');
        $table->answer = $request->input('answer');
        $table->faq_category_id = $request->input('category_id');
        $table->save();

        $request->session()->flash('insert', 'Success');
        return redirect()->route('faq_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
        ]);

        $imageName = "";

        $table = Faq::find($request->input('id'));
        $table->question = $request->input('question');
        $table->answer = $request->input('answer');
        $table->faq_category_id = $request->input('category_id');
        $table->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('faq_view');
    }
    public function delete($id, Request $request)
    {
        $table = Faq::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('faq_view');
    }

    public function status($id,$status){
        $table = Faq::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('faq_view');
    }
}
