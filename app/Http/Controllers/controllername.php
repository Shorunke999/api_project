<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use app\Models\commentsModel;
use Illuminate\Support\Facades\Validator;

class controllername extends Controller
{
    //
    public function index ($id = null){
        $modellings = auth()->user();
        $aa = $id?$modellings -> one():$modellings -> one()->find($id);
        return $aa;
    }
    public function store(Request $req){
        $modellings = auth()->user();
        $as =$modellings ->one();
        $as -> comments = $req ->comments;
        $as -> save();
        if($as){
            return ['result'=>'data has been added succesfully'];
        } else{
            return['result'=> ' pls recheck data' . 'error has happened'];
        }

    }
    public function destroy($id =null){
        $modellings = auth()->user();
        $aa = $id?$modelling -> one():$modelling -> one()->find($id);
        $aa ->delete();
        return ['result'=>'data has been succesfully deletd'];
    }
    public function update(Request $req){
        $modelling = auth()->user();
        $user_id = $req->id;
        $modellings =$modelling ->one()->where('user_id',$user_id)->first();
        $modellings->comments = $req->comments;
        $modellings->save();
        return ['result'=>'data has been succesfully updated'];
    }
}