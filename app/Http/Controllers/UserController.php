<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class UserController extends Controller
{
    public function index()
    {
        $data['a'] = User::all();
        $data['b'] = City::all();
        return view('welcome', $data);
    }
    public function trash()
    {
        $data['a'] = User::onlyTrashed()->get();
        $data['b'] = City::onlyTrashed()->get();
        return view('trash', $data);
    }
    public function delete(Request $req)
    {

        $id = $req->id;
        // print_r($id);
        $type = $req->type;
        $modelName = 'App\Models\\' . $req->modelName;
        // die;
        if (class_exists($modelName)) {
            $model = app($modelName);
            if (isset($id, $type) && $type == "trash") {
                $check = $model->whereIn('id', $id)->delete();
            }
            if (isset($id, $type) && $type == "restore") {
                $check = $model->onlyTrashed()->whereIn('id', $id)->restore();
            }
            if (isset($id, $type) && $type == "delete") {
                $check = $model->withTrashed()->whereIn('id', $id)->forceDelete();
            }
        }
        echo "delete";
    }
}
