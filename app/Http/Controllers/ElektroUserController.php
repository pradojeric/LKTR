<?php

namespace App\Http\Controllers;

use App\ElektroUser;
use Illuminate\Http\Request;

class ElektroUserController extends Controller
{
    //
    public function storeUser(Request $request, $code)
    {
        if($code == "arzA-Game+20"){
            $user = ElektroUser::create([
                'username' => $request->username,
                'school' => $request->school,
            ]);

            return $user->id;
        }else{
            return "Unauthorized";
        }
    }

    public function updateUser(Request $request, $code)
    {
        if($code == "arzA-Game+20"){
            $elektroUser = ElektroUser::find($request->uId);
            if($elektroUser == null){
                ElektroUser::create([
                    'username' => $request->username,
                    'school' => $request->school,
                ]);
                return "User not in db";
            }else{
                $elektroUser->update([
                    'username' => $request->username,
                    'school' => $request->school,
                ]);
                return "User updated";
            }

        }else{
            return "Unauthorized";
        }
    }
}
