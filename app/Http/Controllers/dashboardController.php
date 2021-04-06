<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\User;

class dashboardController extends Controller
{

    public function Index(Request $request){
        $data=[];
        $user = $request->user();
        $data["tiketsnum"]= Tiket::where("user_id", $user->id)->get()->count();
        $data["usersnum"]= User::all()->count();

        return response($data,200);
    }
    //
}
