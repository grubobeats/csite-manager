@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('email-sent'))
        @include('includes.success', ['message'=>trans('global.email-sent')])
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
                            <button id="send-email" data-href="{{ route('mail.send.diary', ['diary_id'=>$diary->id, 'csite_id'=> $construction_site->id]) }}" class="btn btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> @lang('view-diary.send-on-email')</button>
                            <button id="get-link" data-link="{{ route('guests.link', [ 'language'=> \Illuminate\Support\Facades\App::getLocale(), 'csite_id'=>$construction_site->id, 'diary_id'=>$diary->id, 'random_link'=>str_random(30)]) }}" class="btn btn-primary"><i class="fa fa-share" aria-hidden="true"></i> @lang('view-diary.get-link')</button>
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
                                <th>Working time</th>
                            </tr>

                            <tr>
                                <td>{{ $diary->day }}</td>
                                <td>{{ $diary->date }}</td>
                                <td>{{ \App\Http\Controllers\DiaryController::weather($diary->weather) }}, {{ $diary->temperature }} &deg;C</td>
                                <td>{{ $diary->workers }}</td>
                                <td>{{ date('G:i', strtotime($diary->hours_from)) }} - {{ date('G:i', strtotime($diary->hours_to)) }}</td>
                            </tr>
                            <tr>
                                <th colspan="5">@lang('forms.description')</th>
                            </tr>
                            <tr>
                                <td colspan="5" id="description">{{ $diary->description }}</td>
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
                                    <td colspan="5" id="issues">{{ $diary->issues }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th colspan="5">@lang('forms.images'): {{ count($images) }}</th>
                            </tr>
                            @foreach($images as $key => $image)
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td colspan="5">
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
                    <p>@lang('view-diary.no-access') <a href="{{ route('list-diaries', ['csite_id' => $construction_site->id]) }}">@lang('view-diary.click-here')</a> @lang('view-diary.to-g-back')</p>
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
