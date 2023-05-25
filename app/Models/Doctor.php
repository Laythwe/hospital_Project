<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doctor extends Model
{
    use HasFactory;
    public function getAll(){
        return DB::table("doctors")
        ->orderBy("id", "DESC")
        ->where("del_flg", "=", 0)
        ->paginate(10);
    }

    public function allwithoutpagination(){
        return DB::table("doctors")
        ->orderBy("id", "DESC")
        ->where("del_flg", "=", 0)
        ->count();
    }

    public function insert($request)
    {
        DB::table("doctors")
            ->insert([
                "doc_name" => $request->doc_name,
                "doc_room" => $request->doc_room,
                "app_time" => $request->app_time
            ]);
    }

    public function getDoctorByID($id)
    {
        return DB::table("doctors")
            ->find($id);
    }

    public function updateDoctorByID(Request $request, $id)
    {
        DB::table("dcotors")
            ->where("id", "=", $id)
            ->update([
                "doc_name" => $request->doc_name,
                "doc_room" => $request->doc_room,
                "app_time" => $request->app_time
            ]);
    }

    public function deleteDoctor($id)
    {
        DB::table("doctors")
            ->where("id", "=", $id)
            ->update([
                "del_flg" => 1
            ]);
    }

    public function gethome(){
        return DB::table("doctors")
        ->orderBy("id", "DESC")
        ->limit(4)
        ->where("del_flg", "=", 0)
        ->get();
    }

}
