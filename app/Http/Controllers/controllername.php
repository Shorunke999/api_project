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
        // Retrieve the authenticated user
        $user = auth()->user();

        // Assuming you have a 'one' relationship defined in your User model
        $relatedModel = $user->one;

        // Check if the related model exists
        if (!$relatedModel) {
            // If it doesn't exist, create a new instance
            $relatedModel = new RelatedModel();
            // Assuming you have a 'user_id' foreign key in the related model
            $relatedModel->user_id = $user->id;
        }

        // Update the attributes
        $relatedModel->comments = $req->input('comments');

        // Save the related model
        $relatedModel->save();

        return ['result' => 'Data has been added successfully'];
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