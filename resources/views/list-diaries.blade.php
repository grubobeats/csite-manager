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
                    <a href="/"><i class="fa fa-building"></i> Construction Sites</a>
                </li>
                <li class="active">
                    <i class="fa fa-man"></i> Dashboard
                </li>
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
                            <div class="huge">2</div>
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

            @if(count($construction_site) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('dashboard.list_of_construction_sites') }}
                        <a href="{{ route('add-diary', ['csite_id' => $construction_site->id]) }}" class="btn btn-link pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>
                    </div>

                    <div class="panel-body">
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
                                            <a href="#" class="btn btn-default"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Open</a>
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
                    <h1>Welcome!</h1>
                    <p>We are glad to meet you here. However, to proceed please <a href="{{ route('add-csite') }}">click here</a>  to first construction site.</p>
                </div>

            @endif
        </div>
    </div>
</div>
@endsection
