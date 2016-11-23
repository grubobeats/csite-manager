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
                    Dashboard
                </li>
                <li class="active">
                    Add Construction Site
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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add new construction site
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['added-diary', $construction_site->id], 'files'=>true]) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Day</label>
                                {{ Form::number('day', '1', ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                {{ Form::date('date', \Carbon\Carbon::now(), ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="weather">Weather</label>
                                {{ Form::select('weather', ['1' => 'suncano', '2'=> 'Maglovito', '3'=>'Kisovito', '4'=>'Snezno'], null, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="workers">Workers</label>
                                {{ Form::number('workers', '5', ['class' => 'form-control']) }}
                            </div>

                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label for="description">Description</label>
                                {{ Form::textarea('description', 'description', ['class' => 'form-control', 'size'=>'50x5']) }}
                            </div>

                            <div class="form-group">
                                <label for="issues">Issues</label>
                                {{ Form::textarea('issues', 'issues', ['class' => 'form-control', 'size'=>'50x3']) }}
                            </div>

                            <div class="form-group">
                                <label for="images">Images</label>
                                {{--{{ Form::text('images', 'images', ['class' => 'form-control']) }}--}}
                                {{ Form::file('images[]', array('multiple'=>true), ['class' => 'form-control']) }}

                            </div>

                            {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection