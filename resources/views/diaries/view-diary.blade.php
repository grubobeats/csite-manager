@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('email-sent'))
        @include('includes.success', ['message'=>'Your mail is sent successfully!'])
    @endif

    @if(count($errors) > 0)
        @include('includes.error-handler', ['message'=>'Your email is not sent. Please fix the errors bellow and try again.'])
    @endif

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Diary <small>day {{ $diary->day }}</small>
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
            @include('includes.donate-developers')
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
                            <a href="{{ route('list-diaries', ['csite_id' => $construction_site->id]) }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go back</a>
                            <button id="send-email" data-href="{{ route('mail.send.diary', ['diary_id'=>$diary->id, 'csite_id'=> $construction_site->id]) }}" class="btn btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send on e-mail</button>
                            <button id="get-link" data-link="{{ route('guests.link', [ 'language'=> $language, 'csite_id'=>$construction_site->id, 'diary_id'=>$diary->id, 'random_link'=>str_random(30)]) }}" class="btn btn-primary"><i class="fa fa-share" aria-hidden="true"></i> Get link</button>
                        </div>

                        <div class="divider"></div>

                            <div class="well data-holder get-link-here text-center">
                                <button type="button" class="close close-info">&times;</button>
                                Link for client: <a href="#"></a>
                            </div>

                            @include('includes.diary-send-email')



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
                                <th>{{ $diary->weather }}, {{ $diary->temperature }} &deg;</th>
                                <th>{{ $diary->workers }}</th>
                            </tr>
                            <tr>
                                <th colspan="4">Description</th>
                            </tr>
                            <tr>
                                <th colspan="4" id="description">{{ $diary->description }}</th>
                            </tr>

                            @if( $diary->issues === "")
                                <tr class="success">
                                    <th colspan="4">
                                        No issues.
                                    </th>
                                </tr>
                            @else
                                <tr class="danger">
                                    <th colspan="4">
                                        Issues:
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4" id="issues">{{ $diary->issues }}</th>
                                </tr>
                            @endif
                        </table>
                        <br>
                        <table class="table table-bordered">
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


@section('scripts')
    <script>
        $(document).ready(function () {
            var raw_description = $('#description').text();
            var raw_iddues = $('#issues').text();

            $('#description').html(raw_description);
            $('#issues').html(raw_iddues);
        }, 3000);

    </script>
@endsection