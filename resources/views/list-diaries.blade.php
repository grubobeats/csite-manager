@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Diaries <small>{{ $construction_site->name }}</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/public/"><i class="fa fa-building"></i> Construction Manager</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-man"></i> Dashboard</a>
                </li>
                <li class="active">{{ $construction_site->name }}</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>Like Construction Manager?</strong> <a href="#" class="alert-link">Donate developers</a> for new features!
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- /.row -->

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-building fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count($construction_site) }}</div>
                            <div>Construction sites</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count($diaries) }}</div>
                            <div>Diaries</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-male fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">124</div>
                            <div>Workers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">26</div>
                            <div>Days left</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-md-12">

            @if(count($diaries) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('dashboard.list_of_construction_sites') }}
                    </div>

                    <div class="panel-body">

                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go back</a>
                            <a href="{{ route('add-diary', ['csite_id' => $construction_site->id]) }}" class="btn btn-primary">Add new <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>

                        <div class="divider" style="padding:25px"></div>

                        <table class="table table-bordered">

                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Weather</th>
                                <th>Workers</th>
                                <th></th>
                            </tr>
                            @foreach($diaries as $key => $diary)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $diary->date }}</td>
                                    <td>{{ $diary->day }}</td>
                                    <td>{{ $diary->weather }}</td>
                                    <td>{{ $diary->workers }}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="{{ route('view.diary', ['csite_id' => $construction_site->id, 'diary_id'=>$diary->id]) }}" class="btn btn-default"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Open</a>
                                            <a href="#" class="btn btn-default">Edit</a>
                                            <a href="{{ route('deleteDiary', ['csite_id' => $construction_site->id, 'diary_id'=>$diary->id]) }}" class="btn btn-default">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @else

                <div class="jumbotron">
                    <h3>No diaries.</h3>
                    <p>To start working <a href="{{ route('add-diary', ['csite_id' => $construction_site->id]) }}">click here</a>  to add your first diary.</p>
                </div>

            @endif
        </div>
    </div>
</div>
@endsection
