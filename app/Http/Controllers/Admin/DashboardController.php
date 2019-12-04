<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Terms;
use App\Models\About;
use App\Models\Ring_sizer;
use App\Models\Company_data;
use DB;

class DashboardController extends Controller
{
    public function view(Request $request){
        return view('vendor.backpack.base.dashboard');
    }

    public function about(){
    	$data = About::first();
    	return view('vendor.backpack.base.about', ['data'=>$data]);
    }

    public function about_update(Request $request)
    {
        $company_profile = About::first();
        if (empty($company_profile)) {
            $company_profile = new About;
        }

        $company_profile->content =str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('content'));
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('about_view');
    }

    public function ring_sizer(){
        $data = Ring_sizer::first();
        return view('vendor.backpack.base.ring_sizer', ['data'=>$data]);
    }

    public function ring_sizer_update(Request $request)
    {
        $company_profile = Ring_sizer::first();
        if (empty($company_profile)) {
            $company_profile = new Ring_sizer;
        }

        $company_profile->content =str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('content'));
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('ring_sizer_view');
    }

    public function company_data(){
        $data = Company_data::first();
        return view('vendor.backpack.base.company_data', ['data'=>$data]);
    }

    public function company_data_update(Request $request)
    {
        $company_profile = Company_data::first();
        if (empty($company_profile)) {
            $company_profile = new Company_data;
        }

        $company_profile->facebook = $request->input('facebook');
        $company_profile->instagram = $request->input('instagram');
        $company_profile->pinterest = $request->input('pinterest');
        $company_profile->bridestory = $request->input('bridestory');
        $company_profile->email = $request->input('email');
        $company_profile->line = $request->input('line');
        $company_profile->whatsapp = $request->input('whatsapp');
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('company_data_view');
    }

}
