<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;

    public function getAll()
    {
        return DB::table("rooms")
            ->orderBy("id", "DESC")
            ->where("del_flg", "=", 0)
            ->paginate(5);
    }

    public function allwithoutpagination()
    {
        return DB::table("rooms")
            ->orderBy("id", "DESC")
            ->where("del_flg", "=", 0)
            ->count();
    }

    public function insert($request)
    {
        DB::table("rooms")
            ->insert([
                "r_number" => $request->r_number,
                "r_status" => $request->r_status,
                "r_left" => $request->r_left,
                "r_charge" => $request->r_charge
            ]);
    }

    public function getRoomByID($id)
    {
        //SELECT * FROM rooms WHERE id = $id
        return DB::table("rooms")
            ->find($id);
    }

    public function updateRoomByID(Request $request, $id)
    {
        DB::table("rooms")
            ->where("id", "=", $id)
            ->update([
                "r_number" => $request->r_numberr,
                "r_status" => $request->r_status,
                "r_left" => $request->r_left,
                "r_charge" => $request->r_charge
            ]);
    }

    public function deleteRoom($id)
    {
        DB::table("rooms")
            ->where("id", "=", $id)
            ->update([
                "del_flg" => 1
            ]);
    }

    public function gethome()
    {
        return DB::table("rooms")
            ->orderBy("id", "DESC")
            ->limit(4)
            ->where("del_flg", "=", 0)
            ->get();
    }
}
