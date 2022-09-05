<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Pdfs;
use App\Models\Video;
use Illuminate\Http\Request;

class PatientpageController extends Controller
{
    public function index()
    {
        $username = auth()->user()->username;
        $data = Patient::all()->where("patient_id",$username);
        $videos = Video::all()->where("patient_id",$username);
        $reports = Pdfs::all()->where("patient_id",$username);
        return view("patient_page",["data"=>$data,"vids"=>$videos,"reports"=>$reports]);
    }
}
