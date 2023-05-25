<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doctorlist extends Model
{
    use HasFactory;

    public function getAll()
    {
        // return DB::table("doctorlists")
        //     ->join("fields", "doctorlists.id", "=", "fields.doctor_id")
        //     ->orderBy("doctorlists.id", "DESC")
        //     ->where("del_flg", "=", 0) 
        //     ->paginate(5);

        return Doctorlist::has("field")
        ->paginate(1);
        //use has to make sure no error when parent's data r inserted only
    }

    public function allwithoutpagination()
    {
        return DB::table("doctorlists")
            ->orderBy("id", "DESC")
            ->where("del_flg", "=", 0)
            ->count();
    }

    public function insert(Request $request)
    {
        // DB::table("doctorlists")
        //     ->insert([
        //         "name" => $request->name,
        //         "age" => $request->age,
        //         "phone" => $request->phone
        //     ]);

        //     $lastinsert = DB::table("doctorlists")
        //     ->orderBy("id", "desc")
        //     ->limit(1)
        //     ->first();

        //     DB::table("fields")
        //     ->insert([
        //         "special" => $request-> special,
        //         "experience" => $request -> experience,
        //         "medli" => $request -> medli,
        //         "doctor_id" => $lastinsert->id 
        //     ]);

        $doclist = new Doctorlist(); // just a shell and put data
        $doclist->name = $request->name;
        $doclist->age = $request->age;
        $doclist->phone = $request->phone;
        $doclist->save();

        $field = new Field();
        $field->special = $request->special;
        $field->experience =  $request->experience;
        $field->medli =  $request->medli;

        $doclist->field()->save($field);
    }

    public function getDoclistByID($id)
    {
        // return DB::table("doctorlists")
        //     ->find($id);
        return Doctorlist::find($id); 
    }

    public function updateDoclistByID(Request $request, $id)
    {
        // DB::table("doctorlists")
        //     ->where("id", "=", $id)
        //     ->update([
        //         "name" => $request->name,
        //         "age" => $request->age,
        //         "phone" => $request->phone,
        //     ]);
        // no need to write new OOP(shell) as it updates the old data

        $doclist = Doctorlist::find($id);
        $doclist->name = $request->name;
        $doclist->age = $request->age;
        $doclist->phone = $request->phone;

        $doclist->field->special = $request->special;
        $doclist->field->experience =  $request->experience;
        $doclist->field->medli =  $request->medli;

        $doclist->save();
        $doclist->field->save();

    }

    public function deleteDoclist($id)
    {
        DB::table("doctorlists")
            ->where("id", "=", $id)
            ->update([
                "del_flg" => 1
            ]);

        // $doclist = Doctorlist::find($id);
        // $doclist->delete();
    }

    public function getdoclist()
    {
        return DB::table("doctors")
            ->orderBy("id", "DESC")
            ->limit(4)
            ->where("del_flg", "=", 0)
            ->get();
    }

    public function field() //Important
    {
        return $this->hasOne(Field::class);
    }
}
