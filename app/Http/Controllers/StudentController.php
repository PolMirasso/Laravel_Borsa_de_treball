<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function index(Request $request)
    {

        if (request()->ajax()) {
            if ($request->company_population) {

                $data = Offer::where('offer_visiblity', "1")
                    ->where('company_population', $request->company_population)
                    ->orderBy('company_type')
                    ->get();
            } else {
                $data = Offer::where('offer_visiblity', "1")
                    ->orderBy('company_type')
                    ->get();
            }
            return DataTables::of($data)->make(true);

            //    return Datatables()->of($data)->make(true);
            //   return datatables()->of($data)->make(true);
        }

        $datos = Offer::where('offer_visiblity', "1")
            ->orderBy('company_type')
            ->get();

        return view('student.index', compact("datos"));
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
