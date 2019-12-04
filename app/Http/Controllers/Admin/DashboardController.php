<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Terms;
use App\Models\About;
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

}
