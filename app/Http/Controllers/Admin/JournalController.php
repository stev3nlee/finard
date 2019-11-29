<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function view()
    {
        $data = Journal::orderby('id','desc')->get();
        return view('vendor.backpack.base.journal.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.journal.create');
    }
    public function edit($id)
    {
        $data = Journal::find($id);
        return view('vendor.backpack.base.journal.edit', ['data' => $data]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $imageName = "";

        $table = new Journal;
        $table->title = $request->input('title');
        $table->description = str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('description'));
        $table->date = $request->input('date');
        $table->save();

        $detail = Journal::where('id',$table->id)->first();
        if ($request->hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);

            $detail->image = $imageName;
            $detail->save();
        }

        $request->session()->flash('insert', 'Success');
        return redirect()->route('journal_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $imageName = "";

        $table = Journal::find($request->input('id'));
        $table->title = $request->input('title');
        $table->description = str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('description'));
        $table->date = $request->input('date');
        $table->save();

        $detail = Journal::where('id',$request->input('id'))->first();
        if ($request->hasFile('image')) {
            if ($request->input('old_image') != null) {
                $oldimage = base_path() . '/public/upload/' . $request->input('old_image');
                if (file_exists($oldimage)) {
                    unlink($oldimage);
                }
            }

            $imageTempName = $request->file('image')->getPathname();
            $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);
            
        } else {
            $imageName = $request->input('old_image');
        }
        $detail->image = $imageName;
        $detail->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('journal_view');
    }
    public function delete($id, Request $request)
    {
        $table = Journal::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('journal_view');
    }

    public function status($id,$status){
        $table = Journal::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('journal_view');
    }
}
