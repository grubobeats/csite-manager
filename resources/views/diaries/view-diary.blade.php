@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('email-sent'))
        @include('includes.success', ['message'=> trans('global.email-sent')])
    @endif

    @if(count($errors) > 0)
        @include('includes.error-handler', ['message'=>trans('global.email-error')])
    @endif

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('view-diary.diaries') <small>@lang('view-diary.day') {{ $diary->day }}</small>
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
                    @lang('global.diary-for-day'): {{ $diary->day }}
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
                        @lang('view-diary.diary-info')
                    </div>

                    <div class="panel-body">
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <a href="{{ route('list-diaries', ['csite_id' => $construction_site->id]) }}" class="btn btn-primary haveLoader"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('view-diary.go-back')</a>
                            <button id="send-email" data-href="{{ route('mail.send.diary', ['diary_id'=>$diary->id, 'csite_id'=> $construction_site->id]) }}" class="btn btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> @lang('view-diary.send-on-email')</button>
                            <button id="get-link" data-link="{{ route('guests.link', [ 'language'=> $language, 'csite_id'=>$construction_site->id, 'diary_id'=>$diary->id, 'random_link'=>str_random(30)]) }}" class="btn btn-primary"><i class="fa fa-share" aria-hidden="true"></i> @lang('view-diary.get-link')</button>
                        </div>

                        <div class="divider"></div>

                            <div class="well data-holder get-link-here text-center">
                                <button type="button" class="close close-info">&times;</button>
                                @lang('view-diary.link-for-client') <a href="#"></a>
                            </div>

                            @include('includes.diary-send-email')



                        <table class="table table-responsive">

                            <tr>
                                <th>@lang('forms.day')</th>
                                <th>@lang('forms.date')</th>
                                <th>@lang('forms.weather')</th>
                                <th>@lang('forms.workers')</th>
                                <th>Working hours</th>
                            </tr>

                            <tr>
                                <th>{{ $diary->day }}</th>
                                <th>{{ $diary->date }}</th>
                                <th>{{ \App\Http\Controllers\DiaryController::weather($diary->weather) }}, {{ $diary->temperature }} &deg;C</th>
                                <th>{{ $diary->workers }}</th>
                                <th>{{ date('G:i', strtotime($diary->hours_from)) }} - {{ date('G:i', strtotime($diary->hours_to)) }}</th>
                            </tr>
                            <tr>
                                <th colspan="5">@lang('forms.description')</th>
                            </tr>
                            <tr>
                                <th colspan="5" id="description">{{ $diary->description }}</th>
                            </tr>

                            @if( $diary->issues === "")
                                <tr class="success">
                                    <th colspan="5">
                                        @lang('view-diary.no-issues')
                                    </th>
                                </tr>
                            @else
                                <tr class="danger">
                                    <th colspan="5">
                                        @lang('view-diary.issues')
                                    </th>
                                </tr>
                                <tr class="danger">
                                    <th colspan="5" id="issues">{{ $diary->issues }}</th>
                                </tr>
                            @endif
                        </table>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="5">@lang('forms.images'): {{ count($images) }}</th>
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
                    <h3>@lang('view-diary.restricted-access')</h3>
                    <p>@lang('view-diary.no-access') <a href="{{ route('list-diaries', ['csite_id' => $construction_site->id]) }}">@lang('view-diary.click-here')</a> @lang('view-diary.to-go-back')</p>
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