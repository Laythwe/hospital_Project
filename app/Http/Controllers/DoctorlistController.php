<?php

namespace App\Http\Controllers;

use App\Models\Doctorlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoctorlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::channel('customlog')->info("Enter doctorlist page.");
        $doc = new Doctorlist();
        $doclist =  $doc->getAll(); 

        foreach($doclist as $key => $doc){
            $field = $doc->field;
        }


        $doclistcount = $doc->allwithoutpagination();
        Log::channel('customlog')->info("Leaves doctorlist page.");


        return View("Doctorlist.doclist",[
            "docs" => $doclist,
            "doclistcount" => $doclistcount
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel('customlog')->info("Enter Add page.");
        return view("Doctorlist.doclistadd");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        Log::channel('customlog')->info("Enter store session.");
        $doctorlist = new Doctorlist();
        $doctorlist->insert($request);

        Log::channel('customlog')->info("Leave store session.");
        return redirect("/doctorlist"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel('customlog')->info("Enter show page.");
        
        $doctorlist = new Doctorlist();
        $doctorlistinfo = $doctorlist->getDoclistbyID($id);

        Log::channel('customlog')->info("Leave show page.");
        
        return view("Doctorlist.doclistshow",
        [
            "doctorlistinfo" => $doctorlistinfo
        ] 
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::channel('customlog')->info("Enter edit page.");

        $doctorlist = new Doctorlist();
        $doclistinfo = $doctorlist->getDoclistByID($id);
        $field = $doclistinfo->field;   
        
        Log::channel('customlog')->info("Leave edit page.");
        
        return view("Doctorlist.doclistedit",
        [
            "doclistinfo" => $doclistinfo

        ]                         
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::channel('customlog')->info("Enter update session.");

        $doctorlist = new Doctorlist();
        $doctorlist->updateDoclistByID($request, $id);

         Log::channel('customlog')->info("Leave update session.");

         return redirect("/doctorlist");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel('customlog')->info("Enter delete session.");

        $doctorlist= new Doctorlist();
        $doctorlist->deleteDoclist($id);

        Log::channel('customlog')->info("Leave delete session.");
        
        return redirect("/doctorlist");
    }
}
