<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Student_Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{

    public function index()
    {
        $datos = Offer::where('offer_visiblity', "1")->get();
        $id = $datos->sortBy('offer_id')->pluck('offer_id')->unique();
        $company_type =  $datos->sortBy('company_type')->pluck('company_type')->unique();
        $company_population =  $datos->sortBy('company_population')->pluck('company_population')->unique();
        $offer_type =  $datos->sortBy('offer_type')->pluck('offer_type')->unique();
        $working_day_type =  $datos->sortBy('working_day_type')->pluck('working_day_type')->unique();
        $offer_sector =  $datos->sortBy('offer_sector')->pluck('offer_sector')->unique();
        $characteristics =  $datos->sortBy('characteristics')->pluck('characteristics')->unique();

        return view('student.index', compact('id', 'company_type', 'company_population', 'offer_type', 'working_day_type', 'offer_sector', 'characteristics'));
    }



    public function contact($id)
    {
        $offer = Offer::where('offer_id', $id)->where('offer_visiblity', "1")->firstOrFail();


        return view('student.contact', compact('offer'));
    }

    public function saveContact(Request $request, $id)
    {
        $offer = Offer::where('offer_id', $id)->where('offer_visiblity', "1")->firstOrFail();
        $student_id = Auth::user()->id;

        $result = Student_Request::where('offer_id', $offer->offer_id)->where('student_id', $student_id)->first();

        if ($result) {
            return redirect('student')->with('mensaje', 'La peticio sobre aquesta oferta ja esta realitzada');
        }

        $s_Request['student_id'] = $student_id;
        $s_Request['offer_id'] = $offer->offer_id;
        $s_Request['msg_user'] = $request->text_contact;
        $s_Request['state'] = "0";
        $s_Request['visibility'] = "0";

        Student_Request::insert($s_Request); #guardar a la db 

        return redirect('student')->with('mensaje', "S'ha enviat la proposta");
    }
}
