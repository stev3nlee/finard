<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Terms;
use DB;

class DashboardController extends Controller
{
    public function view(Request $request){
        return view('vendor.backpack.base.dashboard');
    }

    public function submission(){
    	$data = Submission::all();
    	return view('vendor.backpack.base.submission.list', ['data'=>$data]);
    }

    public function terms(){
    	$data = Terms::first();
    	return view('vendor.backpack.base.terms', ['data'=>$data]);
    }

    public function updateTermsConditions(Request $request)
    {
        $company_profile = Terms::first();
        if (empty($company_profile)) {
            $company_profile = new Terms;
        }

        $company_profile->content =str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('content'));
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('terms_view');
    }

}
