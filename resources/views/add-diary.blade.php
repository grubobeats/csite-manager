@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($errors) > 0)
        @include('includes.error-handler', ['message'=>trans('global.diary-error')])
    @endif
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
                    {{ trans('forms.add-new-diary') }}
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
                    {{ trans('forms.add-new-csite') }}
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['added-diary', $construction_site->id], 'files'=>true]) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">{{ trans('forms.day') }}</label>
                                {{ Form::number('day', ++$last_diary, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="date">{{ trans('forms.date') }}</label>
                                {{ Form::date('date', \Carbon\Carbon::now(), ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="weather">{{ trans('forms.weather') }}</label>
                                {{ Form::select('weather', ['0' => trans('forms.select-zero'), '1' => trans('forms.select-sunny'), '2' => trans('forms.select-dust'), '3' => trans('forms.select-rainy'), '4' => trans('forms.select-snowing') ], null, ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="temperature">{{ trans('forms.temperature') }}</label>
                                {{ Form::number('temperature', '24', ['class'=>'form-control']) }}
                            </div>

                            <div class="form-group">
                                <label for="workers">{{ trans('forms.workers') }}</label>
                                {{ Form::number('workers', '5', ['class' => 'form-control']) }}
                            </div>

                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label for="description">{{ trans('forms.description') }}</label>
                                {{ Form::textarea('description', 'description', ['class' => 'form-control', 'size'=>'50x5']) }}
                            </div>

                            <div class="form-group">
                                <label for="issues">{{ trans('forms.issues') }}</label>
                                {{ Form::textarea('issues', 'issues', ['class' => 'form-control', 'size'=>'50x3']) }}
                            </div>

                            <div class="form-group">
                                <label for="images">{{ trans('forms.images') }}</label>
                                {{ Form::file('images[]', array('multiple'=>true), ['class' => 'form-control']) }}

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

@section('scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection