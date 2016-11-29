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



                        <table class="table table-bordered">

                            <tr>
                                <th>@lang('forms.day')</th>
                                <th>@lang('forms.date')</th>
                                <th>@lang('forms.weather')</th>
                                <th>@lang('forms.workers')</th>
                            </tr>

                            <tr>
                                <th>{{ $diary->day }}</th>
                                <th>{{ $diary->date }}</th>
                                <th>{{ $diary->weather }}, {{ $diary->temperature }} &deg;</th>
                                <th>{{ $diary->workers }}</th>
                            </tr>
                            <tr>
                                <th colspan="4">@lang('forms.description')</th>
                            </tr>
                            <tr>
                                <th colspan="4" id="description">{{ $diary->description }}</th>
                            </tr>
                            <tr>
                                <th colspan="4" id="issuse">@lang('forms.images')</th>
                            </tr>
                            @if( $diary->issues === "")
                                <tr class="success">
                                    <th colspan="4">
                                        @lang('view-diary.no-issues')
                                    </th>
                                </tr>
                            @else
                                <tr class="danger">
                                    <th colspan="4">
                                        @lang('view-diary.issues')
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4" id="issues">{{ $diary->issues }}</th>
                                </tr>
                            @endif
                            <tr>
                                <th colspan="4">@lang('forms.images'): {{ count($images) }}</th>
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
