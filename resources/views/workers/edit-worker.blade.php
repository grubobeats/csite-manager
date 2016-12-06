@extends('layouts.app')

@section('title', 'Editing worker details')

@section('content')
<div class="container">
    @if(count($errors) > 0)
        @include('includes.error-handler', ['message'=>'Worker not saved. Please fix the errors below and try again.'])
    @endif
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add worker
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/public/"><i class="fa fa-building"></i> Construction Manager</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('list-workers') }}">Workers</a>
                </li>
                <li class="active">
                    Adding new worker
                </li>
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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Adding new worker
                </div>

                <div class="panel-body">
                    {!! Form::open( ['route' => ['post-edit-worker', $worker->user_id, $worker->id] ]) !!}
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="name">Name</label>
                                {{ Form::text('name', $worker->name, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                {{ Form::text('last_name', $worker->last_name, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="birth_date">Date of birth</label>
                                {{ Form::date('birth_date', $worker->birth_date, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                {{ Form::text('address', $worker->address, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                {{ Form::select('gender', ['0' => 'Non assigned', '1' => 'Male', '2' => 'Female'], $worker->gender) }}
                            </div>
                        </div>


                        <div class="col-sm-6 text-right">

                            <div class="form-group">
                                <label for="city">City</label>
                                {{ Form::text('city', $worker->city, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="telephone">Contact phone</label>
                                {{ Form::text('telephone', $worker->telephone, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                {{ Form::text('position', $worker->position, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="hourly_rate">Hourly rate</label>
                                {{ Form::number('hourly_rate', $worker->hourly_rate, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="comment">Comment</label>
                                {{ Form::textarea('comment', $worker->comment, ['class'=>'form-control']) }}
                            </div>

                            <button type="submit" class="btn btn-primary haveLoader">{{ trans('forms.add-diary') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection