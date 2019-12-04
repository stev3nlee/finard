<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function view()
    {
        $data = Journal::where('status',1)->orderby('id','desc')->get();

        return view('journal', ['data' => $data]);
    }

    public function detail($alias)
    {
        $data = Journal::where('slug',$alias)->first();
        $newer = Journal::where('status',1)->first();
        $older = Journal::where('status',1)->where('id','<',$data->id)->first();

        return view('journal-detail', ['data' => $data,'newer' => $newer,'older' => $older]);
    }


}
