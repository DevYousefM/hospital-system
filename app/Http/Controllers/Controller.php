<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Pdfs;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function dashboard(Request $request)
    {
        if (isset($request->searchByName)) {
            $patients = Patient::select()->where("patient_name", "LIKE", "%$request->search%")->get();
            if (count($patients) > 0) {
                return view("dashboard", ["patients" => $patients]);
            } else {
                return view("dashboard", ["message" => "There Is No Result"]);
            }
        } elseif (isset($request->searchById)) {
            $patients = Patient::select()->where("patient_id", "LIKE", "%$request->search%")->get();
            if (count($patients) > 0) {
                return view("dashboard", ["patients" => $patients]);
            } else {
                return view("dashboard", ["message" => "There Is No Result"]);
            }
        } else {
            return view("dashboard", ["patients" => Patient::all()]);
        }
    }
    public function analysis()
    {
        if (Auth::user()->user_type === "patient") {
            return redirect()->route("patient.page");
        } else {

            $operation_a = count(Patient::all()->where("opration_name", "PCI"));
            $operation_b = count(Patient::all()->where("opration_name", "Diagnostic"));
            $state_expense = count(Patient::all()->where("contract_type", "State Expense"));
            $health_insurance = count(Patient::all()->where("contract_type", "Health Insurance"));
            $operations = count(Patient::all());
            return view('analysis', ["operation_a" => $operation_a, "operation_b" => $operation_b, "operations" => $operations,  "state_expense" => $state_expense, "health_insurance" => $health_insurance]);
        }
    }
    public  function show($id)
    {
        $data = Patient::all()->where("patient_id", $id);
        $videos = Video::all()->where("patient_id", $id);
        $reports = Pdfs::all()->where("patient_id", $id);
        return view("singlePatient", ["data" => $data, "vids" => $videos, "reports" => $reports]);
    }
    public function delete($id)
    {
        if (auth()->user()->user_type === "super") {
            $pdfs = Pdfs::all()->where("patient_id", $id);
            $vids = Video::all()->where("patient_id", $id);

            foreach ($vids as $vid) {
                Storage::disk("public")->delete($vid->path);
            }
            foreach ($pdfs as $pdf) {
                Storage::disk("public")->delete($pdf->path);
            }
            Patient::where("patient_id", $id)->delete();
            User::where("username", $id)->delete();
            return redirect()->route("dashboard");
        } else {
            abort(403);
        }
    }
}
