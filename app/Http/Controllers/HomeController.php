<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Quotation;
use App\Models\About;
use App\Models\Newsletter;
use App\Helper\Mailchimp;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->Mailchimp = new Mailchimp();
    }

    public function view()
    {
        $data = Banner::orderby('id','desc')->where('status',1)->get();
        $about = About::first();
        return view('index', ['banner' => $data, 'about'=>$about]);
    }
    
    public function contact(Request $request){
        $validatedData = $request->validate([
            'g-recaptcha-response' => 'required|recaptcha'
        ],
        [
            'g-recaptcha-response.required' => 'Recaptcha is required!',
            'g-recaptcha-response.recaptcha' => 'Please ensure that you are a human!'
        ]);

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
            $contact->to('hello@thefinard.com');
            $contact->subject('The Finard - Contact Us');
        });

        $data = array(
            'email' => $email,
            'name' => $name,
        );

        Mail::send('email_contact_us_member', $data , function($contact)use($data)
        {
            $contact->from(
                'noreply@thefinard.com',
                'The Finard'
            );
            $contact->to($data['email']);
            $contact->subject('The Finard - Contact Us');
        });

        return redirect('contact')->with(['success' => 'Thank you for contacting us! We will get in touch with you shortly.']);
    }

    public function quotation(Request $request){
        //dd($request->input());
        $validatedData = $request->validate([
            'g-recaptcha-response' => 'required|recaptcha'
        ],
        [
            'g-recaptcha-response.required' => 'Recaptcha is required!',
            'g-recaptcha-response.recaptcha' => 'Please ensure that you are a human!'
        ]);

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
            $contact->to('hello@thefinard.com');
            $contact->subject('The Finard - Quotation');
        });

        $data = array(
            'email' => $email,
        );

        Mail::send('email_quotation_member', $data , function($contact)use($data)
        {
            $contact->from(
                'noreply@thefinard.com',
                'The Finard'
            );
            $contact->to($data['email']);
            $contact->subject('The Finard - Quotation');
        });

        return redirect('quotation-form')->with(['success' => 'Thank you for sending us a form! We will get in touch with you shortly.']);;
    }

    public function about()
    {
        $data = About::first();
        return view('about', ['data' => $data]);
    }

    public function newsletter(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        $mailchimp = $this->Mailchimp->insertMember([
            'email' => $email
        ]);
        //return $this->output->returnSuccess();

        // $email = $request->input('email');

        // $table = new Newsletter;
        // $table->email = $email;
        // $table->save();
        if($mailchimp == 'success'){
            $data = array(
                'email' => $email,
            );

            Mail::send('email_newsletter_member', $data , function($contact)use($data)
            {
                $contact->from(
                    'noreply@thefinard.com',
                    'The Finard'
                );
                $contact->to($data['email']);
                $contact->subject('The Finard - Newsletter');
            });

            return back()->with(['success_newsletter' => 'Thank you for subscribing with us!']);
        }else{
            return back()->with(['error_newsletter' => 'Your email has been registered before']);
        }
        
    }

    public function submitEngagement(Request $request){
        //dd($request->input());
         $message =[
                "name.required" => "Name field is required.",
                "phone.required"  => "Phone number field is required.",
                "email.required"  => "Email field is required.",
                "email.email"     => "Email format is wrong.",
                "phone.numeric"       => "Phone number must be numeric.",
                "checkbox_diamond.required"  => "Please pick more than one.",
                "budget.required"      => "Budget field is required.",
                "radio_weight.required"    => "Please pick carat weight.",
                "checkbox_interested.required"    => "Please pick more than one.",
                "radio_joined.required"  => "Please select one.",
                "checkbox_achieve.required"  => "Please pick more than one.",
                "radio_confirm.required"  => "Please confirm your data.",
                "radio_confirm.in"  => "Please pick yes.",
                "guest_name.required"  => "Guest Name field is required.",
                "guest_email.required"  => "Guest Email field is required.",
                "g-recaptcha-response.required" => "Recaptcha is required!",
                "g-recaptcha-response.recaptcha" => "Please ensure that you are a human!",
                //"guest_email.email"     => "Email format is wrong.",
              ];

        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required|numeric',
            'checkbox_diamond' => 'required',
            'radio_weight' => 'required',
            'checkbox_interested' => 'required',
            'budget' => 'required',
            'radio_joined' => 'required',
            'checkbox_achieve' => 'required',
            'radio_confirm' => 'required|in:Yes',
            //'date_appointment' => 'required',
            'guest_name' => 'required',
            'guest_email' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ],$message);
        //dd($request->input());
        $date_appointment = $request->input('date_appointment');
        $time_appointment = $request->input('time_appointment');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $checkbox_diamond = $request->input('checkbox_diamond');
        $radio_weight = $request->input('radio_weight');
        $checkbox_interested = $request->input('checkbox_interested');
        $budget = $request->input('budget');
        $radio_joined = $request->input('radio_joined');
        $guest_name = $request->input('guest_name');
        $guest_email = $request->input('guest_email');
        $checkbox_achieve = $request->input('checkbox_achieve');
        $radio_confirm = $request->input('radio_confirm');

        $table = new Appointment;
        $table->type = 'Engagement Ring Consultation';
        $table->date = date('Y-m-d', strtotime($date_appointment));
        $table->time = $time_appointment;
        $table->name = $name;
        $table->email = $email;
        $table->phone = $phone;
        $table->diamond_shapes = implode(", ", $checkbox_diamond);
        $table->with_guest = $radio_joined;
        $table->guest_name = $guest_name;
        $table->guest_email = $guest_email;
        $table->budget = $budget;
        $table->achieve = implode(", ", $checkbox_achieve);
        $table->data_correct = $radio_confirm;
        $table->style = implode(", ", $checkbox_interested);
        $table->carat_weight = $radio_weight;
        $table->save();

        $data = array(
            'data' => $table,
        );

        Mail::send('email_appointment', $data , function($contact)use($data)
        {
            $contact->from(
                'noreply@thefinard.com',
                'The Finard'
            );
            $contact->to('hello@thefinard.com');
            $contact->subject('The Finard - Engagement Ring Consultation');
        });


        Mail::send('email_appointment_member', $data , function($contact)use($data)
        {
            $contact->from(
                'noreply@thefinard.com',
                'The Finard'
            );
            $contact->to($data['data']->email);
            $contact->subject('The Finard - Engagement Ring Consultation');
        });

        return back()->with(['success_engagement' => 'Thank you!']);
        
    }

    public function submitWedding(Request $request){
        //dd($request->input());
        $message =[
                "name.required" => "Name field is required.",
                "phone.required"  => "Phone number field is required.",
                "email.required"  => "Email field is required.",
                "email.email"     => "Email format is wrong.",
                "phone.numeric"       => "Phone number must be numeric.",
                "checkbox_diamond.required"  => "Please pick more than one.",
                "groom_ring.required"      => "Groom's ring size field is required.",
                "bride_ring.required"      => "Brides's ring size field is required.",
                "radio_joined.required"  => "Please select one.",
                "checkbox_achieve.required"  => "Please pick more than one.",
                "radio_confirm.required"  => "Please confirm your data.",
                "radio_confirm.in"  => "Please pick yes.",
                "guest_name.required"  => "Guest Name field is required.",
                "guest_email.required"  => "Guest Email field is required.",
                "g-recaptcha-response.required" => "Recaptcha is required!",
                "g-recaptcha-response.recaptcha" => "Please ensure that you are a human!",
                //"guest_email.email"     => "Email format is wrong.",
              ];

        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required|numeric',
            'checkbox_diamond' => 'required',
            'radio_joined' => 'required',
            'checkbox_achieve' => 'required',
            'radio_confirm' => 'required|in:Yes',
            //'date_appointment' => 'required',
            'guest_name' => 'required',
            'guest_email' => 'required',
            'groom_ring' => 'required',
            'bride_ring' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ],$message);
        //dd($request->input());
        $date_appointment = $request->input('date_appointment');
        $time_appointment = $request->input('time_appointment');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $groom_ring = $request->input('groom_ring');
        $bride_ring = $request->input('bride_ring');
        $checkbox_diamond = $request->input('checkbox_diamond');
        $radio_joined = $request->input('radio_joined');
        $guest_name = $request->input('guest_name');
        $guest_email = $request->input('guest_email');
        $checkbox_achieve = $request->input('checkbox_achieve');
        $radio_confirm = $request->input('radio_confirm');

        $table = new Appointment;
        $table->type = 'Wedding Band Consultation';
        $table->date = date('Y-m-d', strtotime($date_appointment));
        $table->time = $time_appointment;
        $table->name = $name;
        $table->email = $email;
        $table->phone = $phone;
        $table->grooms_ring_size = $groom_ring;
        $table->brides_ring_size = $bride_ring;
        $table->diamond_shapes = implode(", ", $checkbox_diamond);
        $table->with_guest = $radio_joined;
        $table->guest_name = $guest_name;
        $table->guest_email = $guest_email;
        $table->data_correct = $radio_confirm;
        $table->achieve = implode(", ", $checkbox_achieve);
        $table->save();

        $data = array(
            'data' => $table,
        );

        Mail::send('email_appointment', $data , function($contact)use($data)
        {
            $contact->from(
                'noreply@thefinard.com',
                'The Finard'
            );
            $contact->to('hello@thefinard.com');
            $contact->subject('The Finard - Wedding Band Consultation');
        });


        Mail::send('email_appointment_member', $data , function($contact)use($data)
        {
            $contact->from(
                'noreply@thefinard.com',
                'The Finard'
            );
            $contact->to($data['data']->email);
            $contact->subject('The Finard - Wedding Band Consultation');
        });

        return back()->with(['success_wedding' => 'Thank you!']);
        
    }
}
