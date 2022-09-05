<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Pdfs;
use App\Models\User;
use App\Models\Video;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index()
    {
        return "index";
    }

    public function create()
    {
        if(auth()->user()->user_type === "super"){
            return view("newPatient");
        }else{
            return redirect()->route("dashboard");
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            "patient_name" => "required",
            "patient_age" => "required|integer",
            "patient_id" => "required|integer|min_digits:14",
            "opration_name" => "required|string",
            "contract_type" => "required|string",
            "doctor_name" => "required|string",
            "entry_date" => "required|date",
            "reports"=>"required|file|mimes:pdf,docx",
            "videos"=>"required",
        ]);

        Patient::create([
            "patient_id" => $request->patient_id,
            "patient_name" => $request->patient_name,
            "patient_age" => $request->patient_age,
            "opration_name" => $request->opration_name,
            "contract_type" => $request->contract_type,
            "doctor_name" => $request->doctor_name,
            "entry_date" => $request->entry_date,
        ]);

        $path = $request->reports->store("pdfs", "public");
        Pdfs::create([
            "path" => $path,
            "patient_id" => $request->patient_id,
        ]);

        foreach ($request->videos as $vid) {
            $path = $vid->store("videos", "public");
            Video::create([
                "path" => $path,
                "patient_id" => $request->patient_id,
            ]);
        }

        $user = User::create([
            'name' => $request->patient_name,
            'username' => $request->patient_id,
            'user_type' => "patient",
            'password' => Hash::make($request->patient_id),

        ]);

        event(new Registered($user));

        return redirect()->route("dashboard");
    }

}
