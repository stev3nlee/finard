<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Category;
use App\Models\Sub_category;
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
        $sub_category = Sub_category::where('status',1)->get();
        return view('vendor.backpack.base.product.create', ['category' => $category,'sub_category' => $sub_category]);
    }
    public function edit($id)
    {
        $data = Product::find($id);
        $category = Category::where('status',1)->get();
        $sub_category = Sub_category::where('status',1)->get();
        return view('vendor.backpack.base.product.edit', ['data' => $data,'category' => $category,'sub_category' => $sub_category]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = (null !== $request->input('category')) ? $request->input('category') : [];
        $sub_category = (null !== $request->input('sub_category')) ? $request->input('sub_category') : [];

        $imageName = "";

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('description'));
        $product->price = $request->input('price');
        $product->gold = $request->input('gold');
        $product->save();

        $product->category()->sync($category);
        $product->sub_category()->sync($sub_category);

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
            'name' => 'required|max:255',
        ]);

        $category = (null !== $request->input('category')) ? $request->input('category') : [];
        $sub_category = (null !== $request->input('sub_category')) ? $request->input('sub_category') : [];

        $imageName = "";

        $product = Product::find($request->input('id'));
        $product->name = $request->input('name');
        $product->description = str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('description'));
        $product->price = $request->input('price');
        $product->gold = $request->input('gold');
        $product->save();

        $product->category()->sync($category);
        $product->sub_category()->sync($sub_category);

        $total_images = $request->input('total_images');
        for($i=0;$i<$total_images;$i++){
            $award_image = '';
            if (isset($request->file('image')[$i])) {
                if (isset($request->input('old_image')[$i])) {
                    $oldimage_award = base_path() . '/public/upload/' . $request->input('old_image')[$i];
                    if (file_exists($oldimage_award)) {
                        unlink($oldimage_award);
                    }
                }

                $imageTempName = $request->file('image')[$i]->getPathname();
                $imageAward = md5(rand().'_'.rand().'_'.rand()).'.'.$request->file('image')[$i]->getClientOriginalExtension();
                $path = base_path() . '/public/upload';
                $request->file('image')[$i]->move($path, $imageAward);

                $award_image = $imageAward;


                if(isset($request->input('product_image_id')[$i])){
                    $product_image = Product_image::find($request->input('product_image_id')[$i]);
                }else{
                    $product_image = new Product_image;
                }
                $product_image->product_id = $product->id;
                $product_image->image = $award_image;
                $product_image->save();
                

            }else {
                if (isset($request->input('old_image')[$i])) {
                    $award_image = $request->input('old_image')[$i];
                }

                if($award_image != ''){
                    if(isset($request->input('product_image_id')[$i])){
                        $product_image = Product_image::find($request->input('product_image_id')[$i]);
                    }else{
                        $product_image = new Product_image;
                    }
                    $product_image->product_id = $product->id;
                    $product_image->image = $award_image;
                    $product_image->save();
                }

            }
        }

        // $data = $awards;
        // $syncData = array();
        // foreach($data as $id => $score){
        //     if($score){
        //         $award_image = '';
        //         if (isset($request->file('award_image')[$id])) {
        //             if (isset($request->input('old_image_award')[$id])) {
        //                 $oldimage_award = base_path() . '/public/upload/' . $request->input('old_image_award')[$id];
        //                 if (file_exists($oldimage_award)) {
        //                     unlink($oldimage_award);
        //                 }
        //             }

        //             $imageTempName = $request->file('award_image')[$id]->getPathname();
        //             $award_image = md5(rand().'_'.rand().'_'.rand()).'.'.$request->file('award_image')[$id]->getClientOriginalExtension();
        //             $path = base_path() . '/public/upload';
        //             $request->file('award_image')[$id]->move($path, $award_image);
                    
        //         } else {
        //             if (isset($request->input('old_image_award')[$id])) {
        //                 $award_image = $request->input('old_image_award')[$id];
        //             }
        //         }

        //         $syncData[$score] = array('link' => $request->input('link')[$id], 'image'=>$award_image, 
        //                                     'type' => $request->input('awards_type')[$id]);
        //     }
        // }

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
