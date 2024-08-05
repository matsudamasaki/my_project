<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Samplecontroller extends Controller {
    public function index( Request $request ) {
        $records = DB::connection('mysql')->select("select * from items");
        $name = $records[0]->name;

        // $insertResult = DB::connection("mysql")->insert("insert into users (id,email,name,password) values (null,'test1@example.com','tarou','000')");
        // dd($insertResult);

        // $updateResult = DB::connection("mysql")->update("update items set price = 600 where name = 'ice'");

        $deleteResult = DB::connection("mysql")->delete("delete from users where id = 3");
        dd($deleteResult);
        return view("top/index" , ["sampleValue" => $sampleValue]);
    }
}
