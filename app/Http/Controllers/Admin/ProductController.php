<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Category;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function view()
    {
        $data = Product::orderby('id','desc')->get();
        return view('vendor.backpack.base.product.list', ['data' => $data]);
    }
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('vendor.backpack.base.product.create', ['category' => $category]);
    }
    public function edit($id)
    {
        $data = Product::find($id);
        $category = Category::where('status',1)->get();
        return view('vendor.backpack.base.product.edit', ['data' => $data,'category' => $category]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = (null !== $request->input('category')) ? $request->input('category') : [];

        $imageName = "";

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('description'));
        $product->price = $request->input('price');
        $product->gold = $request->input('gold');
        $product->save();

        $product->category()->sync($category);

        $total_images = $request->input('total_images');

        for($i=0;$i<$total_images;$i++){
            $award_image = '';
            if (isset($request->file('image')[$i])) {
                $imageTempName = $request->file('image')[$i]->getPathname();
                $imageAward = md5(rand().'_'.rand().'_'.rand()).'.'.$request->file('image')[$i]->getClientOriginalExtension();
                $path = base_path() . '/public/upload';
                $request->file('image')[$i]->move($path, $imageAward);

                $award_image = $imageAward;

                $product_image = new Product_image;
                $product_image->product_id = $product->id;
                $product_image->image = $award_image;
                $product_image->save();

            }
        }

        $request->session()->flash('insert', 'Success');
        return redirect()->route('product_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $imageName = "";

        $table = product::find($request->input('id'));
        $table->title = $request->input('title');
        $table->description = str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('description'));
        $table->date = $request->input('date');
        $table->save();

        $detail = product::where('id',$request->input('id'))->first();
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
        return redirect()->route('product_view');
    }
    public function delete($id, Request $request)
    {
        $table = product::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('product_view');
    }

    public function status($id,$status){
        $table = product::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('product_view');
    }
}
