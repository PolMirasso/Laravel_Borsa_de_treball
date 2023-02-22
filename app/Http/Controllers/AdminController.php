<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Models\Student_Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;
use Carbon\Carbon;

class AdminController extends Controller
{


    //Offers Manajer

    public function index()
    {

        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $datos = Offer::where('offer_visiblity', "0")->get();
            $id = $datos->sortBy('offer_id')->pluck('offer_id')->unique();
            $company_email =  $datos->sortBy('company_email')->pluck('company_email')->unique();
            $company_type =  $datos->sortBy('company_type')->pluck('company_type')->unique();
            $company_nif =  $datos->sortBy('company_nif')->pluck('company_nif')->unique();
            $commercial_name =  $datos->sortBy('commercial_name')->pluck('commercial_name')->unique();
            $contact_person =  $datos->sortBy('contact_person')->pluck('contact_person')->unique();
            $company_phone =  $datos->sortBy('company_phone')->pluck('company_phone')->unique();
            $company_population =  $datos->sortBy('company_population')->pluck('company_population')->unique();
            $offer_type =  $datos->sortBy('offer_type')->pluck('offer_type')->unique();
            $working_day_type =  $datos->sortBy('working_day_type')->pluck('working_day_type')->unique();
            $offer_sector =  $datos->sortBy('offer_sector')->pluck('offer_sector')->unique();
            $characteristics =  $datos->sortBy('characteristics')->pluck('characteristics')->unique();

            return view('admin.index', compact('id', 'company_email', 'company_type', 'company_nif', 'commercial_name', 'contact_person', 'company_phone', 'company_population', 'offer_type', 'working_day_type', 'offer_sector', 'characteristics'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function getAllData()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {
            $data = Offer::where('offer_visiblity', "0")->select(
                'offer_id as id',
                'company_email',
                'company_type',
                'company_nif',
                'commercial_name',
                'contact_person',
                'company_phone',
                'company_population',
                'offer_type',
                'working_day_type',
                'offer_sector',
                'characteristics',
                'created_at'
            )->get();

            return compact('data');
        } else {
            return redirect()->intended('/student');
        }
    }

    public function accept($id)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {

            $data = Offer::where('offer_visiblity', 0)->where('offer_id', $id)->select('offer_state', 'offer_visiblity')->first();
            $data->offer_state = "Accepted";
            $data->offer_visiblity = 1;
            Offer::where('offer_visiblity', "0")->where('offer_id', $id)->update($data->toArray());
            return redirect('admin')->with('mensaje', "L'oferta s'ha acceptat."); #redirigir i enviar msg
        } else {
            return redirect()->intended('/student');
        }
    }

    public function edit($id)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {
            $data = Offer::where('offer_id', $id)->first();
            return view('admin.edit', compact('data'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function updatePublish(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {

            $caps_validar = [
                'company_email' => 'required|email',
                'company_type' => 'required|string|max:100',
                'company_nif' => 'required|string|max:8',
                'commercial_name' => 'required|string|max:8',
                'contact_person' => 'required|string|max:100',
                'company_phone' => 'required|string|max:100',
                'company_population' => 'required|string|max:100',
                'offer_type' => 'required|string|max:100',
                'working_day_type' => 'required|string|max:100',
                'offer_sector' => 'required|string|max:100',
                'characteristics' => 'required|string|max:100',

            ];


            $mensaje_Error = [
                'required' => 'El :attribute es obligatori',
            ];

            $this->validate($request, $caps_validar, $mensaje_Error);

            $data = Offer::where('offer_id', $id)->select(
                'company_email',
                'company_type',
                'company_nif',
                'commercial_name',
                'contact_person',
                'company_phone',
                'company_population',
                'offer_type',
                'working_day_type',
                'offer_sector',
                'characteristics',
                'offer_state',
                'offer_visiblity',
                'modification_status'
            )->first();


            $data->company_email = $request->company_email;
            $data->company_type = $request->company_type;
            $data->company_nif = $request->company_nif;
            $data->commercial_name = $request->commercial_name;
            $data->contact_person = $request->contact_person;
            $data->company_phone = $request->company_phone;
            $data->company_population = $request->company_population;
            $data->offer_type = $request->offer_type;
            $data->working_day_type = $request->working_day_type;
            $data->offer_sector = $request->offer_sector;
            $data->characteristics = $request->characteristics;

            $data->offer_state = "Accepted";
            $data->offer_visiblity = 1;
            $data->modification_status = "1";

            Offer::where('offer_id', $id)->update($data->toArray());

            return redirect('admin')->with('mensaje', "S'ha modificat i publicat la oferta");
        } else {
            return redirect()->intended('/student');
        }
    }


    public function deny($id)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {

            $data = Offer::where('offer_id', $id)->select('offer_state', 'offer_visiblity')->first();
            $data->offer_state = "Deny || Canceled";
            $data->offer_visiblity = 2;
            Offer::where('offer_id', $id)->update($data->toArray());
            return redirect('admin')->with('mensaje', "S'ha denegat la oferta");
        } else {
            return redirect()->intended('/student');
        }
    }

    public function ManajePublicOffers()
    {

        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $datos = Offer::where('offer_visiblity', "1")->get();
            $id = $datos->sortBy('offer_id')->pluck('offer_id')->unique();
            $company_email =  $datos->sortBy('company_email')->pluck('company_email')->unique();
            $company_type =  $datos->sortBy('company_type')->pluck('company_type')->unique();
            $company_nif =  $datos->sortBy('company_nif')->pluck('company_nif')->unique();
            $commercial_name =  $datos->sortBy('commercial_name')->pluck('commercial_name')->unique();
            $contact_person =  $datos->sortBy('contact_person')->pluck('contact_person')->unique();
            $company_phone =  $datos->sortBy('company_phone')->pluck('company_phone')->unique();
            $company_population =  $datos->sortBy('company_population')->pluck('company_population')->unique();
            $offer_type =  $datos->sortBy('offer_type')->pluck('offer_type')->unique();
            $working_day_type =  $datos->sortBy('working_day_type')->pluck('working_day_type')->unique();
            $offer_sector =  $datos->sortBy('offer_sector')->pluck('offer_sector')->unique();
            $characteristics =  $datos->sortBy('characteristics')->pluck('characteristics')->unique();

            return view('admin.publicOffersConfig', compact('id', 'company_email', 'company_type', 'company_nif', 'commercial_name', 'contact_person', 'company_phone', 'company_population', 'offer_type', 'working_day_type', 'offer_sector', 'characteristics'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function getAllPublicData()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = Offer::where('offer_visiblity', "1")->select(
                'offer_id as id',
                'company_email',
                'company_type',
                'company_nif',
                'commercial_name',
                'contact_person',
                'company_phone',
                'company_population',
                'offer_type',
                'working_day_type',
                'offer_sector',
                'characteristics',
                'updated_at'
            )->get();


            $data->map(function ($item) {

                $date = date_create($item->updated_at);
                $item->updated_at_format = date_format($date, "d/m/Y H:i:s");

                return $item;
            });


            return compact('data');
        } else {
            return redirect()->intended('/student');
        }
    }



    //User Manager

    public function editUsr($id)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = User::where('id', $id)->first();
            return view('admin.editUser', compact('data'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function changePassword($id)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = User::where('id', $id)->first();
            return view('admin.changePassword', compact('data'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function updateAdmin(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $caps_validar = [
                'username' => 'required|string|max:100',
                'email' => 'required|email',
            ];

            $mensaje_Error = [
                'required' => 'El :attribute es obligatori', #en cas de algun camp falti
            ];

            if ($user->type_user == 2) {
                if ($user->id != $id) {
                    return redirect('admin/users')->with('mensaje', "No pots modificar aquest usuari.");
                }
            }

            $this->validate($request, $caps_validar, $mensaje_Error);

            $result = User::where('email', $request->email)->first();


            if ($result->email == $user->email) {
                return redirect('admin/users')->with('mensaje',  "El correu ja esta registrat");
            }

            $dades_usuari = request()->except('_token', '_method');

            User::where('id', $id)->update($dades_usuari);
            return redirect('admin/users')->with('mensaje', "El usuari s'ha modificat.");
        } else {
            return redirect()->intended('/student');
        }
    }


    public function updatePassword(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $caps_validar = [
                'password' => 'required|min:4|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/',
            ];


            $mensaje_Error = [
                'required' => 'El :attribute es obligatori', #en cas de algun camp falti
                'password.required' => 'La contrasenya és obligatòria.',
                'password.regex' => "La contrasenya ha de tenir com a mínim una lletra i un dígit, i la seva longitud ha de ser d'almenys quatre caràcters.",

            ];

            if ($user->type_user == 2) {
                if ($user->id != $id) {
                    return redirect('admin/users')->with('mensaje', "No pots modificar aquest usuari.");
                }
            }

            $this->validate($request, $caps_validar, $mensaje_Error);

            $data = Hash::make($request->password);
            User::where('id', $id)->update(array('password' => $data));
            return redirect('admin/users')->with('mensaje',  "S'ha modificat la contrasenya");
        } else {
            return redirect()->intended('/student');
        }
    }

    public function deleteUsr($id)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {

            User::where('id', $id)->first()->delete();
            return redirect("admin/users");
        } else {
            return redirect()->intended('/student');
        }
    }

    public function getUsersData()
    {
        $user = Auth::user();

        if ($user->type_user == 1) {
            $data = User::where('type_user', "!=", "0")->select(
                'id',
                'username',
                'email',
                'type_user',
            )->get();

            $data->map(function ($item) {
                switch ($item->type_user) {
                    case '1':
                        $item->type_user = 'Admin';
                        break;
                    case '2':
                        $item->type_user = 'Permis Lectura';
                        break;
                }
                return $item;
            });

            return compact('data');
        } else if ($user->type_user == 2) {
            $data = User::where('type_user', "!=", "0")->select(
                'id',
                'username',
                'email',
                'type_user',
            )->where('id', $user->id)->get();

            $data->map(function ($item) {
                switch ($item->type_user) {
                    case '1':
                        $item->type_user = 'Admin';
                        break;
                    case '2':
                        $item->type_user = 'Permis Lectura';
                        break;
                }
                return $item;
            });

            return compact('data');
        } else {
            return redirect()->intended('/student');
        }
    }

    public function usersView()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {


            $datos = User::where('type_user', "!=", "0")->get();
            $id = $datos->sortBy('id')->pluck('id')->unique();
            $username =  $datos->sortBy('username')->pluck('username')->unique();
            $email =  $datos->sortBy('email')->pluck('email')->unique();
            $type_user =  $datos->sortBy('type_user')->pluck('type_user')->unique();

            $type_user = $type_user->map(function ($item) {
                switch ($item) {
                    case '1':
                        $item = 'Admin';
                        break;
                    case '2':
                        $item = 'Permis Lectura';
                        break;
                }
                return $item;
            });

            return view('admin.users', compact('id', 'username', 'email', 'type_user'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function addUsr()
    {
        $user = Auth::user();

        if ($user->type_user == 1) {
            return  view('admin.addUser');
        } else {
            return redirect()->intended('/student');
        }
    }

    public function registerAdmin(Request $request)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {
            $newUser = new User();

            $caps_validar = [
                'username' => 'required|string|max:100',
                'email' => 'required|email',
                'password' => 'required|string|max:100',
            ];

            $mensaje_Error = [
                'required' => 'El :attribute es obligatori', #en cas de algun camp falti
            ];

            $this->validate($request, $caps_validar, $mensaje_Error);

            $result = User::where('email', $request->email)->first();

            if (!$result) {
                return redirect('admin/users')->with('mensaje',  "El correu ja esta registrat");
            }

            $newUser->username = $request->username;
            $newUser->email = $request->email;
            $newUser->course = null;
            $newUser->population = null;
            $newUser->mobility = null;
            $newUser->password = Hash::make($request->password); //encriptar contrasenya
            $newUser->type_user = 2;

            $newUser->save();
            return redirect('admin/users')->with('mensaje',  "S'ha registrat el usuari");
        } else {
            return redirect()->intended('/student');
        }
    }

    public function moreInfoCompanyOffer($idOffer)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = Offer::where("offer_id", $idOffer)->first();

            return view('admin.moreInfoCompanyOffer', compact('data'));
        }
    }


    //Student request manager

    public function getStudentRequests()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {
            $data = Student_Request::with('student', 'offer')->where('visibility', '0')->get();

            return compact('data');
        } else {
            return redirect()->intended('/student');
        }
    }


    public function requestView()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {
            return view('admin.requestStudent');
        } else {
            return redirect()->intended('/student');
        }
    }

    public function downloadCV($id): BinaryFileResponse
    {

        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = User::where('id', $id)->select(
                'cv_name',
                'username',
            )->first();


            $file = storage_path('app/public/' . $data->cv_name);
            $newName = $data->username . ".pdf";

            return response()->download($file, $newName);
        } else {
            return redirect()->intended('/student');
        }
    }

    public function requestVisibility($idStudent, $idOffer)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            Student_Request::where('student_id', $idStudent)->where('offer_id', $idOffer)->update(['visibility' => 1]);

            return view('admin.requestStudent');
        } else if ($user->type_user == 1) {
            return redirect()->intended('/student');
        }
    }

    public function moreInfo($idStudent, $idOffer)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = Student_Request::with('student', 'offer')->where("student_id", $idStudent)->where("offer_id", $idOffer)->first();

            return view('admin.moreInfo', compact('data'));
        }
    }

    public function sendMailCompany($idStudent, $idOffer)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = Student_Request::with('student', 'offer')->where("student_id", $idStudent)->where("offer_id", $idOffer)->first();

            $pathToFile = storage_path('app/public/' . $data->student->cv_name);
            $filename = "CV_" . $data->student->username . ".pdf";

            $details = [
                'subject' => 'Borsa de treball |  La Salle Mollerussa',
                'title' => 'Sol·licitud de ' . $data->offer_type . ' de ' . $data->student->username,
                'body1' => "Benvolgut/uda " . $data->offer->contact_person . ",",
                'body2' => "Li escric en nom de " . $user->username . " per informar-li que hem rebut una sol·licitud de " . $data->offer->offer_type . " de " . $data->student->username . " per la seva empresa.",
                'body3' => "Com a part del procés de sol·licitud, " . $data->student->username . " ha proporcionat el seu currículum que pot trobar adjunt a aquest correu electrònic. A més a més, a través del nostre lloc web, hem verificat la seva experiència i habilitats relacionades amb el lloc de treball.",
                'body4' => "Si està interessat/ada en procedir amb la sol·licitud de " . $data->offer->commercial_name . ", si us plau faci'ns-ho saber perquè puguem proporcionar-li més detalls i posar-lo en contacte amb el candidat.",
                'body5' => "Gràcies pel seu temps i consideració.",
                'body6' => "Atentament,",
                'body7' => $user->username . ",",
                'body8' => $user->email,
                'fileName' => $filename,
                'fileRoute' => $pathToFile,
            ];

            Mail::to($data->offer->company_email)->send(new SendMail($details));

            return redirect('admin/requestView')->with('mensaje', "S'ha enviat la oferta a la empresa");
        }
    }


    //student user info

    public function studentView()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $datos = User::where('type_user', "0")->get();
            $id = $datos->sortBy('id')->pluck('id')->unique();
            $username =  $datos->sortBy('username')->pluck('username')->unique();
            $email =  $datos->sortBy('email')->pluck('email')->unique();
            $course =  $datos->sortBy('course')->pluck('course')->unique();
            $population =  $datos->sortBy('population')->pluck('population')->unique();
            $mobility =  $datos->sortBy('mobility')->pluck('mobility')->unique();

            $mobility = $mobility->map(function ($item) {
                switch ($item) {
                    case '1':
                        $item = 'Si';
                        break;
                    case '0':
                        $item = 'No';
                        break;
                }
                return $item;
            });

            return view('admin.studentUsers', compact('id', 'username', 'email', 'course', 'population', 'mobility'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function getStudentData()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {
            $data = User::where('type_user', "0")->select(
                'id',
                'username',
                'email',
                'course',
                'population',
                'mobility',
            )->get();

            $data->map(function ($item) {
                switch ($item->mobility) {
                    case '1':
                        $item->mobility = 'Si';
                        break;
                    case '2':
                        $item->mobility = 'No';
                        break;
                }
                return $item;
            });

            return compact('data');
        } else {
            return redirect()->intended('/student');
        }
    }

    public function editStudent($id)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {

            $data = User::where('id', $id)->first();
            return view('admin.editStudent', compact('data'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function updateStudent(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {

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
                'course.required' => 'El curs es obligatòri.',
                'population.required' => 'La població és obligatòria.',
                'cv_name.nullable' => 'El curriculum es obligatori.',
            ];

            if ($user->type_user == 2) {
                if ($user->id != $id) {
                    return redirect('admin/users')->with('mensaje', "No pots modificar aquest usuari.");
                }
            }

            $this->validate($request, $caps_validar, $mensaje_Error);

            $result = User::where('email', $request->email)->first();

            if ($result) {
                if ($result->email == $user->email) {
                    return redirect('admin/studentView')->with('mensaje',  "El correu ja esta registrat");
                }
            }

            $dades_usuari = request()->except('_token', '_method');

            if ($request->hasFile('cv_name')) {
                $uniqueFileName = (uniqid() . '-' . $request->username . '.pdf');
                $dades_usuari['cv_name'] = $request->file('cv_name')->storeAs('uploads', $uniqueFileName, 'public');
            }

            User::where('id', $id)->update($dades_usuari);
            return redirect('admin/studentView')->with('mensaje', "El alumne s'ha modificat.");
        } else {
            return redirect()->intended('/student');
        }
    }

    //logs 

    public function getDeletedStudentRequests()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {
            $data = Student_Request::with('student', 'offer')->where('visibility', '1')->get();
            return compact('data');
        } else {
            return redirect()->intended('/student');
        }
    }

    public function logRequests()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {
            return view('admin.logRequests');
        } else {
            return redirect()->intended('/student');
        }
    }


    public function requestRestoreVisibility($idStudent, $idOffer)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            Student_Request::where('student_id', $idStudent)->where('offer_id', $idOffer)->update(['visibility' => 0]);

            return view('admin.logRequests');
        } else if ($user->type_user == 1) {
            return redirect()->intended('/student');
        }
    }

    public function moreInfoNoVisible($idStudent, $idOffer)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = Student_Request::with('student', 'offer')->where("student_id", $idStudent)->where("offer_id", $idOffer)->first();

            return view('admin.moreInfoNoVisible', compact('data'));
        }
    }

    public function getDeletedAllData()
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {
            $data = Offer::where('offer_visiblity', "2")->select(
                'offer_id as id',
                'company_email',
                'company_type',
                'company_nif',
                'commercial_name',
                'contact_person',
                'company_phone',
                'company_population',
                'offer_type',
                'working_day_type',
                'offer_sector',
                'characteristics',
                'created_at'
            )->get();

            return compact('data');
        } else {
            return redirect()->intended('/student');
        }
    }

    public function logOffers()
    {

        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $datos = Offer::where('offer_visiblity', "2")->get();
            $id = $datos->sortBy('offer_id')->pluck('offer_id')->unique();
            $company_email =  $datos->sortBy('company_email')->pluck('company_email')->unique();
            $company_type =  $datos->sortBy('company_type')->pluck('company_type')->unique();
            $company_nif =  $datos->sortBy('company_nif')->pluck('company_nif')->unique();
            $commercial_name =  $datos->sortBy('commercial_name')->pluck('commercial_name')->unique();
            $contact_person =  $datos->sortBy('contact_person')->pluck('contact_person')->unique();
            $company_phone =  $datos->sortBy('company_phone')->pluck('company_phone')->unique();
            $company_population =  $datos->sortBy('company_population')->pluck('company_population')->unique();
            $offer_type =  $datos->sortBy('offer_type')->pluck('offer_type')->unique();
            $working_day_type =  $datos->sortBy('working_day_type')->pluck('working_day_type')->unique();
            $offer_sector =  $datos->sortBy('offer_sector')->pluck('offer_sector')->unique();
            $characteristics =  $datos->sortBy('characteristics')->pluck('characteristics')->unique();

            return view('admin.logOffers', compact('id', 'company_email', 'company_type', 'company_nif', 'commercial_name', 'contact_person', 'company_phone', 'company_population', 'offer_type', 'working_day_type', 'offer_sector', 'characteristics'));
        } else {
            return redirect()->intended('/student');
        }
    }

    public function recover($id)
    {
        $user = Auth::user();

        if ($user->type_user == 1) {

            $data = Offer::where('offer_visiblity', 2)->where('offer_id', $id)->select('offer_state', 'offer_visiblity')->first();
            $data->offer_state = "Recuperated";
            $data->offer_visiblity = 0;
            Offer::where('offer_visiblity', "2")->where('offer_id', $id)->update($data->toArray());
            return redirect('admin/logOffers')->with('mensaje', 'recuperat'); #redirigir i enviar msg

        } else {
            return redirect()->intended('/student');
        }
    }

    public function moreInfoOffer($idOffer)
    {
        $user = Auth::user();

        if ($user->type_user == 1 || $user->type_user == 2) {

            $data = Offer::where("offer_id", $idOffer)->first();

            return view('admin.moreInfoOffer', compact('data'));
        }
    }
}
