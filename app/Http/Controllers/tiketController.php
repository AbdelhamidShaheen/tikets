<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Traits\EmailService;


class tiketController extends Controller
{
    use EmailService;

    function list(Request $request) {
        $user = $request->user();
        if ($user->role == "admin") {

            return Tiket::where("user_id", $user->id)->get();

        } elseif ($user->role == "user") {
            return Tiket::all();
        }

    }
    public function GetById($id)
    {
        //
        return Tiket::find($id);
    }

    public function create(Request $request)
    {

        $rules = ["deadline" => ["required", "date"]];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();

            return response($errors, 400);
        }
        $tiket = new Tiket();
        $tiket->deadline = $request->deadline;
        $tiket->uid = (string) Str::uuid();
        $tiket->user_id = $request->user()->id;
        $tiket->state = "open";
        $tiket->assigned = false;
        $tiket->save();
       
        // $this->send($request->user()->email,"Tiket Creation","tiket creation operation success");
        return response(["tiket creation success"], 201);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = ["deadline" => ["date"]];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();

            return response($errors, 400);
        }
        $tiket = Tiket::find($id);
        if ($tiket) {
            $tiket->deadline = $request->has('deadline') ? $request->deadline : $tiket->deadline;
            $tiket->state = $request->has('state') ? $request->state : $tiket->state;

            if ($request->has('user_id') && ($request->user_id != $tiket->user_id) && User::find($request->user_id)) {
                $tiket->user_id = $request->user_id;
                $tiket->assigned = true;
            }
            $tiket->save();
        }
        // $this->send($request->user()->email,"Update Tiket","Update tiket operation success");

        return response(["tiket update success"], 200);
        //
    }

    public function delete(Request $request,$id)
    {
        $tiket = Tiket::find($id);
        if (!$tiket) {
            return response(["tiket not found "], 204);

        }
        $tiket->delete();
        // $this->send($request->user()->email,"delete Tiket","delete tiket operation success");

        return response(["tiket delete success"], 200);

    }
}
