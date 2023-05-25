<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    use HasFactory;
    public function getAll(){
        return DB::table("messages")
        ->orderBy("id", "DESC")
        ->where("del_flg", "=", 0)
        ->paginate(10);
    }

    public function allwithoutpagination(){
        return DB::table("messages")
        ->orderBy("id", "DESC")
        ->where("del_flg", "=", 0)
        ->count();
    }

    public function insert($request)
    {
        DB::table("messages")
            ->insert([
                "m_message" => $request->m_message, 
                "m_time" => $request->m_time
            ]);
    }

    public function getMessageByID($id)
    {
        return DB::table("messages")
            ->find($id);
    }

    public function updateMessageByID(Request $request, $id)
    {
        DB::table("messages")
            ->where("id", "=", $id)
            ->update([
                "m_message"=> $request->m_message,
                "m_time" => $request -> m_time
            ]);
    }

    public function deleteMessage($id)
    {
        DB::table("messages")
            ->where("id", "=", $id)
            ->update([
                "del_flg" => 1
            ]);
    }
    public function gethome(){
        return DB::table("messages")
        ->orderBy("id", "DESC")
        ->limit(4)
        ->where("del_flg", "=", 0)
        ->get();
    }
}
