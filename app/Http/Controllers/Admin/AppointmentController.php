<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function view()
    {
        $data = Appointment::orderby('id','desc')->get();
        return view('vendor.backpack.base.appointment.list', ['data' => $data]);
    }

    public function detail($id)
    {
        $data = Appointment::find($id);
        return view('vendor.backpack.base.appointment.detail', ['data' => $data]);
    }

    public function delete($id, Request $request)
    {
        $table = Appointment::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('appointment_view');
    }
}
