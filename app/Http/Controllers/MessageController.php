<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
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
        Log::channel('customlog')->info("Enter messagelist page.");
        $message = new Message();
        $messagelist = $message->getAll();
        $messagecount = $message->allwithoutpagination();
        Log::channel('customlog')->info("Leaves messagelist page.");

        return View("Message.message", [
            "mess" => $messagelist,
            "messagecount" => $messagecount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel('customlog')->info("Enter Add page.");
        return view("Message.addmess");
    }

    /**
     * Store a newly created resource in storage.
     * @param \GuzzleHttp\Psr7\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::channel('customlog')->info("Enter store session.");
        $message = new Message();
        $message->insert($request);
        Log::channel('customlog')->info("Leave store session.");
        return redirect("/message"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel('customlog')->info("Enter show page.");
        $message = new Message();
        $messinfo = $message->getMessageByID($id);
        Log::channel('customlog')->info("Leave show page.");
        return view("Message.showmess",
        [
            "messinfo" => $messinfo
        ]                         
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::channel('customlog')->info("Enter edit page.");
        $message = new Message();
        $messinfo = $message->getMessageByID($id);
        Log::channel('customlog')->info("Leave edit page.");
        return view("Message.editmess",
        [
            "messinfo" => $messinfo
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
        $message = new Message();
        $message->updateMessageByID($request, $id);
        Log::channel('customlog')->info("Leave update session.");
        return redirect("/message");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel('customlog')->info("Enter delete session.");
        $message= new Message();
        $message->deleteMessage($id);
        Log::channel('customlog')->info("Leave delete session.");
        return redirect("/message");
    }
}
