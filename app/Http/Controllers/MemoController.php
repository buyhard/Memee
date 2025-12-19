<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    function create(Request $request){
        $memo = new Memo();
        $memo->deadline = strtotime($request->deadline);
        $memo->description = $request->description;
        $memo->isFinished = false;
        $memo->isDeleted = false;
        $memo->save();
        return response()->json($request);

    }

    function get(Request $request){
        //0:未完了の項目
        //1:完了した項目
        //2:削除した項目
        switch($request->type){
            case 0:
                $returnData = Memo::where('isDeleted','0')
                                    ->where('isFinished','0')
                                    ->orderBy('deadline','asc')
                                    ->get();
            break;
            case 1:
                $returnData = Memo::where('isDeleted','0')
                                    ->where('isFinished','1')
                                    ->get();
            break;
            case 2:
                $returnData = Memo::where('isDeleted','1')
                                    ->get();
            break;

        }

        return response()->json($returnData);
    }

    function delete(Request $request){
        $data = Memo::find($request->id);
        $data->isDeleted = true;
        $data->save();
        //$data->delete();
        return response()->json(['ok'=>'ok']);
    }

    function update(Request $request){
        $data = Memo::find($request->id);
        $data->isFinished = $request->newIsFinished;
        $data->save();
        return response()->json(['ok'=>'ok']);
    }
}
