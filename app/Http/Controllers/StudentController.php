<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Student_Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;


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


        $details = [
            'subject' => 'Solicitud de ' . Auth::user()->username,
            'title' => 'El alumne ' . Auth::user()->username . ' ha enviat una solicitud de empresa',
            'body1' => 'El alumne' . Auth::user()->username . ', amb correu ' . Auth::user()->email . ' ha enviat una solicitud per a la empresa ',
            'body2' => "La solicitud conte el seguent missatje :" . $request->text_contact,
            'body3' => "",
            'body4' => "",
            'body5' => "",
            'body6' => "",
            'body7' => "",
            'body8' => "",
            'fileName' => "",
            'fileRoute' => "",
        ];


        Mail::to(env('ADMIN_RECIVE_MAIL', ''))->send(new SendMail($details));


        return redirect('student')->with('mensaje', "S'ha enviat la proposta");
    }

    public function updateStudentPage(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->id == $id) {

            $data = User::where('id', $id)->first();
            return view('student.editStudent', compact('data'));
        } else {
            return redirect()->intended('/student');
        }
    }


    public function updateStudentData(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->id == $id) {

            $caps_validar = [
                'username' => 'required|string|max:100',
                'email' => 'required|email',
                'course' => 'required|string|max:100',
                'population' => 'required|string|max:100',
                'cv_name' => 'nullable|mimes:pdf|max:10000',
            ];


            $mensaje_Error = [
                'required' => 'El :attribute es obligatori', #en cas de algun camp falti

                'email.required' => 'El correu es obligatòri.',
                'password.required' => 'La contrasenya és obligatòria.',
                'password.regex' => "La contrasenya ha de tenir com a mínim una lletra i un dígit, i la seva longitud ha de ser d'almenys quatre caràcters.",
                'course.required' => 'El curs es obligatòri.',
                'population.required' => 'La població és obligatòria.',
                'cv_name.nullable' => 'El curriculum es obligatori.',
            ];

            $this->validate($request, $caps_validar, $mensaje_Error);

            $result = User::where('email', $request->email)->first();

            if ($result) {
                if ($result->email != $user->email) {
                    return redirect('admin/studentView')->with('mensaje',  "El correu ja esta registrat");
                }
            }

            if ($request->password != "") {
                $data = Hash::make($request->password);
                User::where('id', $id)->update(array('password' => $data));
            }

            $dades_usuari = request()->except('_token', '_method', 'password');

            if ($request->hasFile('cv_name')) {

                $uniqueFileName = (uniqid() . '-' . $request->username . '.pdf');
                $dades_usuari['cv_name'] = $request->file('cv_name')->storeAs('uploads', $uniqueFileName, 'public');
            } else {

                $dades_usuari = request()->except('_token', '_method', 'password', 'cv_name');
            }
            User::where('id', $id)->update($dades_usuari);

            return redirect('student')->with('mensaje', "El alumne s'ha modificat.");
        } else {
            return redirect()->intended('/student');
        }
    }
}
