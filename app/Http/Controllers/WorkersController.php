<?php

namespace App\Http\Controllers;

use App\WorkingDay;
use Illuminate\Http\Request;
use App\Workers;
use Illuminate\Support\Facades\Auth;

class WorkersController extends Controller
{

    public function userID() {
        $user_id = Auth::id();
        return $user_id;
    }

    public function list_workers(Request $request) {
//        $workers = Workers::where('user_id', $this->userID())->orderBy('id', 'desc')->get();

        $search = $request->input('search');

        // Perform search or just show diaries
        $workers = Workers::where(array(
            ['user_id', $this->userID()],
            ['name', 'like', "%$search%" ],
        ))
            ->orWhere(array(
                ['last_name', 'like', "%$search%"],
                ['position', 'like', "%$search%" ],
            ))
            ->orderBy('name', 'desc')->paginate(10);

        $context = array(
            'user_id' => $this->userID(),
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
        $worker->user_id = $this->userID();
        $worker->save();

        return redirect()->route('list-workers')->with(['added' => true]);
    }

    public function post_deleteWorker($user_id, $worker_id) {

        $conditions = array(
            'id' => $worker_id,
            'user_id' => $user_id
        );

        $worker = Workers::where($conditions);
        $worker->delete();

        return redirect()->route('list-workers')->with(['deleted'=>true]);
    }

    public function get_editWorker($user_id, $worker_id) {
        $conditions = array(
            'id' => $worker_id,
            'user_id' => $user_id
        );

        $worker = Workers::where($conditions)->first();

        $context = array(
            'worker' => $worker,
        );

        return view('workers/edit-worker', $context);
    }

    public function post_editWorker($user_id, $worker_id, Request $request) {
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

        $conditions = array(
            'id' => $worker_id,
            'user_id' => $user_id
        );

        $worker = Workers::where($conditions)->first();
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
        $worker->user_id = $this->userID();
        $worker->update();

        return redirect()->route('list-workers')->with(['edited' => true]);
    }

    public function get_showWorker($user_id, $worker_id, Request $request)
    {
        $worker = Workers::where('id', $worker_id)->first();

        $search = $request->input('search');

        // Perform search or just show diaries
        $working_day = WorkingDay::where(array(
            ['worker_id', $worker_id],
            ['date', 'like', "%$search%" ],
        ))->orderBy('date', 'desc')->paginate(10);

        $context = array(
            'worker' => $worker,
            'working_days' => $working_day
        );

        return view('workers/show-worker', $context);
    }

    public function post_addWorkersFromDiary(Request $request) {

        $workers = $request['workers'];
        $starting_at = $request['started_at'];
        $finished_at = $request['finished_at'];



        for ($i=0; $i < count($workers); $i++) {

            $worker_data = Workers::where('id', $workers[$i])->first();

            $diff = (strtotime($finished_at[$i]) - strtotime($starting_at[$i])) / 3600;
            $earned = $diff * $worker_data->hourly_rate;

            $working_day = new WorkingDay();
            $working_day->worker_id = isset($workers[$i]) ? $workers[$i] : "0";
            $working_day->started_at = isset($starting_at[$i]) ? $starting_at[$i] : "1";
            $working_day->finished_at = isset($finished_at[$i]) ? $finished_at[$i] : "2";
            $working_day->date = $request['date'];
            $working_day->hours_worked = $diff;
            $working_day->hourly_rate = $worker_data->hourly_rate;
            $working_day->earned_today = $earned;
            $working_day->comment = "null";
            $working_day->save();
        }

        return "good";
    }

    public function removeWorkingDay($user_id, $worker_id, $working_day_id) {
        $workingDay = WorkingDay::where('id', $working_day_id)->first();
        $workingDay->delete();

        return redirect()
            ->route('show-worker', ['user_id'=>$this->userID(), 'worker_id'=>$worker_id])
            ->with(['deleted'=>true]);
    }

}
