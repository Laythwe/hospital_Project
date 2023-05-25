<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware("verifylogin")->except(["index", "show"]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::channel('customlog')->info("Enter doctorlist page.");
       $doctor = new Doctor();
       $doctorlist = $doctor->getAll();
       $doctorcount = $doctor->allwithoutpagination();
       Log::channel('customlog')->info("Leaves doctorlist page.");

       return View("Doctor.doctor",[
        "doctors" => $doctorlist,
        "doctorcount" => $doctorcount
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel('customlog')->info("Enter Add page.");
        return view("Doctor.adddoc");
    }

    /**
     * Store a newly created resource in storage.
     *  @param \GuzzleHttp\Psr7\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::channel('customlog')->info("Enter store session.");
        $doctor = new Doctor();
        $doctor->insert($request);
        Log::channel('customlog')->info("Leave store session.");
        return redirect("/doctor"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel('customlog')->info("Enter show page.");
        $doctor = new Doctor();
        $doctorinfo = $doctor->getDoctorByID($id);
        Log::channel('customlog')->info("Leave show page.");
        return view("Doctor.showdoc",
        [
            "doctorinfo" => $doctorinfo
        ]                         
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::channel('customlog')->info("Enter edit page.");
        $doctor = new Doctor();
        $doctorinfo = $doctor->getDoctorByID($id);
        Log::channel('customlog')->info("Leave edit page.");
        return view("Doctor.editdoc",
        [
            "doctorinfo" => $doctorinfo
        ]                         
    );
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     *  @param int $id
     *  @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        Log::channel('customlog')->info("Enter update session.");
        $doctor = new Doctor();
        $doctor->updateDoctorByID($request, $id);
        Log::channel('customlog')->info("Leave update session.");
        return redirect("/doctor");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel('customlog')->info("Enter delete session.");
        $doctor = new Doctor();
        $doctor->deleteDoctor($id);
        Log::channel('customlog')->info("Leave delete session.");
        return redirect("/doctor");
    }
}
