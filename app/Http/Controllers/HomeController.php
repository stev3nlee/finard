<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Quotation;
use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view()
    {
        $data = Banner::orderby('id','desc')->where('status',1)->get();
        return view('index', ['banner' => $data]);
    }
    
    public function contact(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $table = new Contact;
        $table->name = $name;
        $table->email = $email;
        $table->phone = $phone;
        $table->subject = $subject;
        $table->message = $message;
        $table->save();

        return redirect('contact')->with(['success' => 'Message Successfully Send']);;
    }

    public function quotation(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $ring_detail = $request->input('ring_detail');
        $setting = $request->input('setting');
        $carat = str_replace(","," - ",$request->input('carat'));
        $budged = str_replace(","," - ",$request->input('budged'));

        if($ring_detail){
            $ring_detail = implode(", ",$ring_detail);
        }
        if($setting){
            $setting = implode(", ",$setting);
        }

        $imageName='';
        if ($request->hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = md5(rand().rand()) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);
        }

        $table = new Quotation;
        $table->name = $name;
        $table->email = $email;
        $table->phone = $phone;
        $table->subject = $subject;
        $table->message = $message;
        $table->ring_detail = $ring_detail;
        $table->setting = $setting;
        $table->carat = $carat;
        $table->budged = $budged;
        $table->image = $imageName;
        $table->save();

        return redirect('quotation-form')->with(['success' => 'Quotation Successfully Send']);;
    }

    public function about()
    {
        $data = About::first();
        return view('about', ['data' => $data]);
    }
}
