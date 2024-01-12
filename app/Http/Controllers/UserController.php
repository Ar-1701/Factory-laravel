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
        $id = base64_decode($req->id);
        $type = base64_decode($req->type);
        $modelName = 'App\Models\\' . base64_decode($req->modelName);
        if (class_exists($modelName)) {
            $model = app($modelName);
            if (isset($id, $type) && $type == "trash") {
                $check = $model->find($id);
                if (isset($check)) {
                    $check->delete();
                }
            }
            if (isset($id, $type) && $type == "restore") {
                $check = $model->onlyTrashed()->find($id);
                if (isset($check)) {
                    $check->restore();
                }
            }
            if (isset($id, $type) && $type == "delete") {
                $check = $model->withTrashed()->find($id);
                if (isset($check)) {
                    $check->forceDelete();
                }
            }
        }
        return redirect('/');
    }
}
