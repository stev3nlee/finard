<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Faq;
use App\Models\Faq_category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function view($alias)
    {
        $category = Category::where('slug',$alias)->first();
        $products = Product::where('status',1)->with(['category','color']);

        if($category){
            $products = $products->whereHas('category', function($q) use($category) {
            $q->where('category.id', '=', $category->id); });
        }

        $products = $products->get();
        return view('shop', ['product' => $products]);
    }

    public function category($alias)
    {
        $category = Sub_category::where('slug',$alias)->first();
        $products = Product::where('status',1)->with(['category','sub_category','color']);

        if($category){
            $products = $products->whereHas('sub_category', function($q) use($category) {
            $q->where('sub_category.id', '=', $category->id); });
        }

        $products = $products->get();
        return view('shop', ['product' => $products]);
    }

    public function faq()
    {
        $data = Faq_category::with(['faq'])->get();
        return view('faq', ['data' => $data]);
    }

    public function detail($slug)
    {
        $data = Product::where('slug',$slug)->first();
        return view('shop-detail', ['data' => $data]);
    }

}
