<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{

    protected $resourceDefaults = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'getData'];

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

    public function getData()
    {
        $data = Offer::where('offer_visiblity', "1")->select(
            'offer_id as id',
            'company_type',
            'company_population',
            'offer_type',
            'working_day_type',
            'offer_sector',
            'characteristics'
        )->get();


        return compact('data');
    }
}
