<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkersController extends Controller
{
    public function list_workers() {

        return view('workers/list-workers');
    }
}
