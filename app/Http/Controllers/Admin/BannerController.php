<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function view()
    {
        $data = Banner::orderby('id','desc')->get();
        return view('vendor.backpack.base.banner.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.banner.create');
    }
    public function edit($id)
    {
        $data = Banner::find($id);
        return view('vendor.backpack.base.banner.edit', ['data' => $data]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:banner',
        ]);

        $imageName = "";
        $imageNameMobile = "";

        $table = new Banner;
        $table->name = $request->input('name');
        $table->image = $imageName;
        //$table->link = $request->input('link');
        $table->save();

        $detail = Banner::where('id',$table->id)->first();
        if ($request->hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);

            $detail->image = $imageName;
            $detail->save();
        }

        if ($request->hasFile('mobile_image')) {
            $imageTempName = $request->file('mobile_image')->getPathname();
            $imageNameMobile = md5(rand().rand()) . '.' . $request->file('mobile_image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('mobile_image')->move($path, $imageNameMobile);

            $detail->mobile_image = $imageNameMobile;
            $detail->save();
        }

        $request->session()->flash('insert', 'Success');
        return redirect()->route('banner_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:banner,name,'.$request->input('id'),
        ]);

        $imageName = "";
        $imageNameMobile = "";

        $table = Banner::find($request->input('id'));
        $table->name = $request->input('name');
        $table->image = $imageName;
        //$table->link = $request->input('link');
        $table->save();

        $detail = Banner::where('id',$request->input('id'))->first();
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

        if ($request->hasFile('mobile_image')) {
            if ($request->input('old_image_mobile') != null) {
                $oldimagemobile = base_path() . '/public/upload/' . $request->input('old_image_mobile');
                if (file_exists($oldimagemobile)) {
                    unlink($oldimagemobile);
                }
            }

            $imageTempName = $request->file('mobile_image')->getPathname();
            $imageNameMobile = md5(rand().rand()) . '.' . $request->file('mobile_image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('mobile_image')->move($path, $imageNameMobile);
            
        } else {
            $imageNameMobile = $request->input('old_image_mobile');
        }

        $detail->image = $imageName;
        $detail->mobile_image = $imageNameMobile;
        $detail->save();
        $request->session()->flash('update', 'Success');
        return redirect()->route('banner_view');
    }
    public function delete($id, Request $request)
    {
        $table = Banner::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('banner_view');
    }

    public function status($id,$status){
        $table = Banner::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('banner_view');
    }
}
