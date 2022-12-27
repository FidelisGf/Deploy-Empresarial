<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Help extends Controller
{
    function startTransaction(){
        $pdo = DB::getPdo();
        $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT,0);
        $pdo->beginTransaction();
    }
    function rollbackTransaction(){
        $pdo = DB::getPdo();
        $pdo->rollback();
        $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT,1);
    }
    function commit(){
        $pdo = DB::getPdo();
        $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT,1);
        $pdo->commit();
    }
    function compareIfChange($item, $item2){
        $item2 =json_decode(json_encode($item2), true);
        $item = json_decode(json_encode($item), true);
        for($i = 0; $i < sizeof($item); $i++){
            if($item[$i] != $item2[$i]){
                return $item[$i];
            }
        }
    }
}
