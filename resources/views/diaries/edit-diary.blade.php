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
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('list-diaries', ['csite_id'=>$construction_site->id]) }}">{{ $construction_site->name }}</a>
                </li>
                <li class="active">
                    Add new diary
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
                    {!! Form::open(['route' => ['edited.diary', $construction_site->id, $diary->id], 'files'=>true]) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Day</label>
                                {{ Form::number('day', $diary->day, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                {{ Form::date('date', $diary->date, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="weather">Weather</label>
                                {{ Form::select('weather', ['suncano' => 'Suncano', 'vedro' => 'Vedro', 'maglovito'=> 'Maglovito', 'kisovito'=>'Kisovito', 'snezno'=>'Snezno'], $diary->weather, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="temperature">temperature</label>
                                {{ Form::number('temperature', $diary->temperature, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="workers">Workers</label>
                                {{ Form::number('workers', $diary->workers, ['class' => 'form-control']) }}
                            </div>

                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label for="description">Description</label>
                                {{ Form::textarea('description', $diary->description, ['class' => 'form-control', 'size'=>'50x5']) }}
                            </div>

                            <div class="form-group">
                                <label for="issues">Issues</label>
                                {{ Form::textarea('issues', $diary->issues, ['class' => 'form-control', 'size'=>'50x3']) }}
                            </div>

                            <div class="form-group">
                                <label for="images">Images</label>
                                {{ Form::file('images[]', array('multiple'=>true), ['class' => 'form-control']) }}

                            </div>

                            {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="row">
                        <div class="col-sm-6">
                            @if(count($images) > 0)
                                <label>Images:</label>
                                <table class="table table-bordered table-images">
                                    @foreach($images as $key => $image)
                                        <tr>
                                            <td>{{ ++$counter }}</td>
                                            <td width="300px">
                                                <img class="diary-image img-responsive" src="{{ route('diary.image', ['filename'=>$image->name]) }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('delete.image', ['image_id'=>$image->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <div class="well">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i> You don't have added images for this diary
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
