<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServerTimeController extends Controller
{
    //
    public function getServerTime()
    {
        $mydate = now();
        echo $mydate;
    }
}
