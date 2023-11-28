<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\commentsModel;
use Illuminate\Support\Facades\Validator;

class controllername extends Controller
{
    //
    public function index ($id = null){
        $modellings = auth()->user();
        $aa = $id?$modellings -> one():$modellings -> one()->find($id);
        return $aa;
    }
    public function store(Request $req)
    {
        $user = auth()->user();
        $comment_model = $user->one();
        $comment_model->create(['comments'=> $req->comments]);
        return ['result' => 'Data has been added successfully'];
    }
    public function destroy($id =null){
        $modellings = auth()->user();
        $aa = $id?$modellings -> one():$modellings -> one()->find($id);
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