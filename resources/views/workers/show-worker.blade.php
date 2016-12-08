@extends('layouts.app')

@section('title')
    Workers: {{ $worker->name }} {{ $worker->last_name }}
@endsection

@section('content')
<div class="container">
    @if (Session::has('added'))
        @include('includes.success', ['message'=>'New record added.'])
    @endif

    @if (Session::has('edited'))
        @include('includes.success', ['message'=>'Saved changes.'])
    @endif

    @if (Session::has('deleted'))
        @include('includes.deleted', ['message'=>'Worker deleted'])
    @endif
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Workers: {{ $worker->name }} {{ $worker->last_name }}
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/public/"><i class="fa fa-building"></i> Construction Manager</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-man"></i> Dashboard</a>
                </li>
                <li class="active">Workers</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            @include('includes.donate-developers')
        </div>
    </div>
    <!-- /.row -->

    @if(Auth::user()->subscribed('main'))

    <div class="row">
        <div class="col-md-12">
            @if(count($working_days) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of workers
                    </div>

                    <div class="panel-body">
                        <div class="btn-group pull-left" role="group" aria-label="...">
                            {!! Form::open(['method'=>'GET', 'route' => ['show-worker', $worker->user_id, $worker->id], 'role'=>'search', 'class'=>'form-inline']) !!}
                                <div class="form-group">
                                    <input type="date" class="form-control" id="search" placeholder="@lang('global.search')" name="search">
                                </div>
                                <button type="submit" class="btn btn-default haveLoader"><i class="fa fa-search" aria-hidden="true"></i></button>
                            {!! Form::close() !!}
                        </div>

                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <a href="#" class="btn btn-primary haveLoader"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('view-diary.go-back')</a>
                            <a href="{{ route('get-add-worker') }}" class="btn btn-primary haveLoader">@lang('view-diary.add-new') <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>

                        <div class="divider" style="padding:25px"></div>

                        <table class="table table-responsive">

                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Worked hours</th>
                                <th>Earned</th>
                                <th></th>
                            </tr>

                            @foreach($working_days as $key => $day)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $day->date }}</td>
                                    <td>{{ date('H:i', strtotime($day->started_at)) }}</td>
                                    <td>{{ date('H:i', strtotime($day->finished_at)) }}</td>
                                    <td>{{ $day->hours_worked }}</td>
                                    <td>{{ $day->earned_today }}</td>
                                    <td></td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

                {{ $working_days->links() }}
            @else

                <div class="jumbotron">
                    <h3>No workers yet</h3>
                    <p>However, to add new worker just <a href="{{ route('get-add-worker') }}">@lang('global.click-here')</a></p>
                </div>

            @endif
        </div>
    </div>

    @else
        <div class="jumbotron">
            <h3>You are not subscribed.</h3>
            <p>This section is only for premium users. In order to proceed please <a href="{{ route('checkout') }}">subscribe</a> to one of our plans.</p>
        </div>
    @endif
</div>
@endsection
