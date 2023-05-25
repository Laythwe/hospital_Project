<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
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

        Log::channel('customlog')->info("Enter roomlist page.");
        $room = new Room();
        $roomList = $room->getAll();  
        $roomcount = $room->allwithoutpagination();
        Log::channel('customlog')->info("Leaves roomlist page.");
 
        
        return View("Room.room",[
            "rooms" => $roomList,
            "roomcount" => $roomcount
        ]);
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel('customlog')->info("Enter Add page.");
        return view("Room.add");
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \GuzzleHttp\Psr7\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); to check  first whether data are in or not
        Log::channel('customlog')->info("Enter store session.");
        $room = new Room();
        $room->insert($request);

        Log::channel('customlog')->info("Leave store session.");
        return redirect("/room"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        Log::channel('customlog')->info("Enter show page.");
        $room = new Room();
        $roominfo = $room->getRoomByID($id);

        Log::channel('customlog')->info("Leave show page.");
        return view("Room.show",
        [
            "roominfo" => $roominfo
        ]                         
    );
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::channel('customlog')->info("Enter edit page.");
        $room = new Room();
        $roominfo = $room->getRoomByID($id);
        Log::channel('customlog')->info("Leave edit page.");
        return view("Room.edit",
        [
            "roominfo" => $roominfo
        ]                         
    );
    }

    /**
     * Update the specified resource in storage.
     *  @param \Illuminate\Http\Request $request
     *  @param int $id
     *  @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, $id)
    {
        Log::channel('customlog')->info("Enter update session.");
         $room = new Room();
         $room->updateRoomByID($request, $id);
         Log::channel('customlog')->info("Leave update session.");
         return redirect("/room");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel('customlog')->info("Enter delete session.");
        $room= new Room();
        $room->deleteDoctorlist($id);

        Log::channel('customlog')->info("Leave delete session.");
        return redirect("/doctorlist");
    }
}
