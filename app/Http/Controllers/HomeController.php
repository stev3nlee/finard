<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Quotation;
use App\Models\About;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    public function view()
    {
        $data = Banner::orderby('id','desc')->where('status',1)->get();
        $about = About::first();
        return view('index', ['banner' => $data, 'about'=>$about]);
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

        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message_contact' => $message,
        );

        Mail::send('email_contact_us', $data , function($contact)use($data)
        {
            $contact->from(
                'noreply@thefinard.com',
                'The Finard'
            );
            $contact->to('noreply@thefinard.com');
            $contact->subject('The Finard Contact Us');
        });

        return redirect('contact')->with(['success' => 'Thank you for contacting us! We will get in touch with you shortly.']);;
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

        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message_contact' => $message,
            'ring_detail' => $ring_detail,
            'setting' => $setting,
            'carat' => $carat,
            'budged' => $budged,
            'image' => $imageName,
        );

        Mail::send('email_quotation', $data , function($contact)use($data)
        {
            $contact->from(
                'noreply@thefinard.com',
                'The Finard'
            );
            $contact->to('noreply@thefinard.com');
            $contact->subject('The Finard - Contact Us');
        });

        return redirect('quotation-form')->with(['success' => 'Thank you for sending us a form! We will get in touch with you shortly.']);;
    }

    public function about()
    {
        $data = About::first();
        return view('about', ['data' => $data]);
    }
}
