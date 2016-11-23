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
                    <a href="/"><i class="fa fa-building"></i> Construction Manager</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"> <i class="fa fa-man"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('list-diaries', ['csite_id'=>$construction_site->id]) }}">{{ $construction_site->name }}</a>
                </li>
                <li class="active">
                    Diary for day {{ $diary->day }}
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
                            <div class="huge">{{ count($diary) }}</div>
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
            @if($diary)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Diary info
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered">

                            <tr>
                                <th>Day</th>
                                <th>Date</th>
                                <th>Weather</th>
                                <th>Workers</th>
                            </tr>

                            <tr>
                                <th>{{ $diary->day }}</th>
                                <th>{{ $diary->date }}</th>
                                <th>{{ $diary->weather }}</th>
                                <th>{{ $diary->workers }}</th>
                            </tr>
                            <tr>
                                <th colspan="4">Description</th>
                            </tr>
                            <tr>
                                <th colspan="4">{{ $diary->description }}</th>
                            </tr>
                            <tr>
                                <th colspan="4">Issues</th>
                            </tr>
                            <tr>
                                <th colspan="4">{{ $diary->issues }}</th>
                            </tr>
                            <tr>
                                <th colspan="4">{{ count($images) }} images</th>
                            </tr>
                            @foreach($images as $key => $image)
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td colspan="3">
                                        <img class="diary-image img-responsive" src="{{ route('diary.image', ['filename'=>$image->name]) }}">
                                    </td>
                                </tr>
                             @endforeach
                        </table>
                    </div>
                </div>

            @else
                <div class="jumbotron">
                    <h3>Restricted access!</h3>
                    <p>Unfortunattelly, you can't access this diary, <a href="{{ route('list-diaries', ['csite_id' => $construction_site->id]) }}">click here</a> to go back.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
