<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DrugController extends Controller
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
       Log::channel('customlog')->info("Enter druglist page.");
       $drug = new Drug();
       $druglist = $drug->getAll(); 
       $drugcount = $drug->allwithoutpagination();
       Log::channel('customlog')->info("Leaves druglist page.");


       return View("Drug.druglist",[
        "drugs" => $druglist,
        "drugcount" => $drugcount
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel('customlog')->info("Enter Add page.");
        return view("Drug.adddrug");
    }

    /**
     * Store a newly created resource in storage.
     * @param \GuzzleHttp\Psr7\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::channel('customlog')->info("Enter store session.");
        $drug = new Drug();
        $drug->insert($request);
        Log::channel('customlog')->info("Leave store session.");
        return redirect("/drug"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel('customlog')->info("Enter show page.");
        $drug = new Drug();
        $druginfo = $drug->getDrugByID($id);
        Log::channel('customlog')->info("Leave show page.");
        return view("Drug.showdrug",
        [
            "druginfo" => $druginfo
        ]                         
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::channel('customlog')->info("Enter edit page.");
        $drug = new Drug();
        $druginfo = $drug->getDrugByID($id);
        Log::channel('customlog')->info("Leave edit page.");
        return view("Drug.editdrug",
        [
            "druginfo" => $druginfo
        ]                         
    );
    }

    /**
     * Update the specified resource in storage.
     *  @param \Illuminate\Http\Request $request
     *  @param int $id
     *  @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        Log::channel('customlog')->info("Enter update session.");
        $drug = new Drug();
        $drug->updateDrugByID($request, $id);
        Log::channel('customlog')->info("Leave update session.");
        return redirect("/drug");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            Log::channel('customlog')->info("Enter delete session.");
            $drug= new Drug();
            $drug->deleteDrug($id);
            Log::channel('customlog')->info("Leave delete session.");
            return redirect("/drug");
        }
    }
}
