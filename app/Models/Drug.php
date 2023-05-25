<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Drug extends Model
{
    use HasFactory;
    public function getAll()
    {
       return  DB::table("drugs")
       ->orderBy("id", "DESC")
       ->where("del_flg", "=", 0)
       ->paginate(10);
    }

    public function allwithoutpagination()
    {
       return  DB::table("drugs")
       ->orderBy("id", "DESC")
       ->where("del_flg", "=", 0)
       ->count();
    }

    public function insert($request)
    {
        DB::table("drugs")
            ->insert([
                "d_name" => $request->d_name,
                "d_weight" => $request->d_weight,
                "d_stock" => $request->d_stock,
                "d_price" => $request->d_price
            ]);
    }

    public function getDrugByID($id)
    {
        //SELECT * FROM rooms WHERE id = $id
        return DB::table("drugs")
            ->find($id);
    }

    public function updateDrugByID(Request $request, $id)
    {
        DB::table("drugs")
            ->where("id", "=", $id)
            ->update([
                "d_name" => $request->d_name,
                "d_weight" => $request->d_weight,
                "d_stock" => $request->d_stock,
                "d_price" => $request->d_price
            ]);
    }

    public function deleteDrug($id)
    {
        DB::table("drugs")
            ->where("id", "=", $id)
            ->update([
                "del_flg" => 1
            ]);
    }

    public function gethome()
    {
       return  DB::table("drugs")
       ->orderBy("id", "DESC")
       ->limit(4)
       ->where("del_flg", "=", 0)
       ->get();
    }
}
