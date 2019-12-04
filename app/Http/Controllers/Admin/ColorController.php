<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function view()
    {
        $data = Color::orderby('id','desc')->get();
        return view('vendor.backpack.base.color.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.color.create');
    }
    public function edit($id)
    {
        $data = Color::find($id);
        return view('vendor.backpack.base.color.edit', [
            'data' => $data,
        ]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:color',
        ]);

        $table = new Color;
        $table->name = $request->input('name');
        $table->color = $request->input('color');
        $table->save();

        $request->session()->flash('insert', 'Success');
        return redirect()->route('color_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:color,name,'.$request->input('id'),
        ]);

        $table = Color::find($request->input('id'));
        $table->name = $request->input('name');
        $table->color = $request->input('color');
        $table->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('color_view');
    }
    public function delete($id, Request $request)
    {
        $table = Color::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('color_view');
    }

    public function status($id,$status){
        $table = Color::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('color_view');
    }
}
