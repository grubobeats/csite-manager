@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Diaries <small>{{ $construction_site->name }}</small>
            </h1>
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
            @if($diary)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Diary info
                    </div>

                    <div class="panel-body">

                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <button id="send-email" data-href="{{ route('mail.send.diary', ['diary_id'=>$diary->id, 'csite_id'=> $construction_site->id]) }}" class="btn btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send on e-mail</button>
                            <button id="get-link" data-link="{{ route('guests.link', [ 'language'=> \Illuminate\Support\Facades\App::getLocale(), 'csite_id'=>$construction_site->id, 'diary_id'=>$diary->id, 'random_link'=>str_random(30)]) }}" class="btn btn-primary"><i class="fa fa-share" aria-hidden="true"></i> Get link</button>
                        </div>

                        <div class="divider"></div>

                        <div class="well data-holder get-link-here text-center">
                            <button type="button" class="close close-info">&times;</button>
                            Link for client: <a href="#"></a>
                        </div>

                        <div class="col-sm-offset-8 col-sm-4 well data-holder send-email text-center">
                            <button type="button" class="close close-info">&times;</button>
                            {!! Form::open(['route' => ['mail.send.diary', $diary->id, $construction_site->id], 'files'=>true]) !!}

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="form-inline">
                                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Recepients email here']) }}
                                        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
                                    </div>
                                    <br>

                                </div>
                            </div>


                            {!! Form::close() !!}
                        </div>


                        <div class="well data-holder">
                            Some date
                        </div>


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
