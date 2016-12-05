@extends('layouts.app')

@section('title', 'Workers')

@section('content')
<div class="container">
    @if (Session::has('added'))
        @include('includes.success', ['message'=>'New worker added.'])
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
                Workers
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
            @if(count($workers) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of workers
                    </div>

                    <div class="panel-body">
                        <div class="btn-group pull-left" role="group" aria-label="...">
                            {!! Form::open(['method'=>'GET', 'url' => 'search_url_goes_here', 'role'=>'search', 'class'=>'form-inline']) !!}
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" placeholder="@lang('global.search')" name="search">
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
                                <th>Name</th>
                                <th>Position</th>
                                <th>Contact</th>
                                <th></th>
                            </tr>
                            @foreach($workers as $key => $worker)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $worker->name }} {{ $worker->last_name }}</td>
                                    <td>{{ $worker->position }}</td>
                                    <td>{{ $worker->telephone }}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="/" class="btn btn-default haveLoader" title="@lang('forms.open')"><i class="fa fa-folder-open-o" aria-hidden="true"></i></a>
                                            <a href="/" class="btn btn-default haveLoader" title="@lang('forms.edit')"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                            <a href="{{ route('post-delete-worker', ['user_id'=>$worker->user_id, 'worker_id'=> $worker->id]) }}" class="btn btn-default haveLoader" title="@lang('forms.delete')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                {{--{{ $diaries->links() }}--}}
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
