<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $datos['offers'] = Offer::where('offer_visiblity', "1")
            ->orderBy('company_type')
            ->get();


        $datos['offers']->except('company_email');
        $datos['offers']->except('company_type');
        $datos['offers']->except('commercial_name');
        $datos['offers']->except('contact_person');
        $datos['offers']->except('company_phone');
        $datos['offers']->except('offer_state');
        $datos['offers']->except('offer_visiblity');
        $datos['offers']->except('modification_status');
        $datos['offers']->except('created_at');

        //  return view('index', $datos);
        return view('student.index', $datos);
    }

    public function html()
    {
        return $this->Offer()
            ->setTableId('testTable')
            ->columns($this->getColumns())
            ->minifiedAjax();
        //   $company_email = $offer->sortBy('company_email')->pluck('company_email')->un
    }
}
