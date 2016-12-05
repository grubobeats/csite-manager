<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workers;
use Illuminate\Support\Facades\Auth;

class WorkersController extends Controller
{
    public $user_id;

    public function __construct()
    {
        $this->user_id = Auth::id();
    }

    public function list_workers() {

        $workers = Workers::where('user_id', $this->user_id)->orderBy('id', 'desc')->get();

        $context = array(
            'user_id' => $this->user_id,
            'workers' => $workers
        );
        return view('workers/list-workers', $context);
    }

    public function get_addWorkers() {
        return view('workers/add-worker');
    }

    public function post_addWorkers(Request $request) {
        $this->validate($request, array(
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'address' => 'required',
            'city' => 'required',
            'telephone' => 'required',
            'position' => 'required',
            'hourly_rate' => 'required',
            'comment' => 'required',
        ));

        $worker = new Workers();
        $worker->name = $request['name'];
        $worker->last_name = $request['last_name'];
        $worker->gender = $request['gender'];
        $worker->birth_date = $request['birth_date'];
        $worker->address = $request['address'];
        $worker->city = $request['city'];
        $worker->telephone = $request['telephone'];
        $worker->position = $request['position'];
        $worker->hourly_rate = $request['hourly_rate'];
        $worker->comment = $request['comment'];
        $worker->save();

        return redirect()->route('list-workers')->with(['added' => true]);
    }
}
