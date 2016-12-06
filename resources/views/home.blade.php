@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('added'))
        @include('includes.success', ['message'=>trans('global.csite-added')])
    @endif

    @if (Session::has('edited'))
        @include('includes.success', ['message'=>trans('global.csite-edited')])
    @endif

    @if (Session::has('deleted'))
        @include('includes.deleted', ['message'=>trans('global.csite-deleted')])
    @endif
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Construction Manager <small>1.0.0</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/public/"><i class="fa fa-building"></i> Construction Manager</a>
                </li>
                <li class="active">Dashboard</li>
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
                            <div>@lang('global.construction-sites')</div>
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
                            <div class="huge">{{ $count_diaries }}</div>
                            <div>@lang('global.diaries')</div>
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
                            <div class="huge">{{ $workers }}</div>
                            <div>@lang('global.workers')</div>
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
                    </div>

                    <div class="panel-body">

                        <a href="{{ route('add-csite') }}" class="btn btn-primary pull-right haveLoader">@lang('forms.add-new-csite') <i class="fa fa-plus" aria-hidden="true"></i></a>

                        <div class="divider" style="padding:25px"></div>


                        <table class="table table-responsive">

                            <tr>
                                <th>Id</th>
                                <th>@lang('forms.construction-site')</th>
                                <th>@lang('forms.name')</th>
                                <th>@lang('forms.investor')</th>
                                <th>@lang('forms.last-diary')</th>
                                <th></th>
                            </tr>
                            @foreach($construction_site as $key => $csite)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $csite->name }}</td>
                                    <td>{{ $csite->address }}, {{ $csite->city }}</td>
                                    <td>{{ $csite->investor }}</td>
                                    <td>22.11.2016. 18:43</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="{{ route('list-diaries', ['csite_id' => $csite->id]) }}" class="btn btn-default haveLoader" title="@lang('forms.open')"><i class="fa fa-folder-open-o" aria-hidden="true"></i></a>
                                            <a href="{{ route('editConstructionSite', ['csite_id' => $csite->id]) }}" class="btn btn-default haveLoader" title="@lang('forms.edit')"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                            <a
                                                href="{{ route('deleteConstructionSite', ['csite_id' => $csite->id]) }}"
                                                class="btn btn-default haveLoader" title="@lang('forms.delete')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @else

                <div class="jumbotron">
                    <h1>@lang('global.welcome')</h1>
                    <p>@lang('global.we-are-glad') <a href="{{ route('add-csite') }}">@lang('global.click-here')</a> @lang('global.to-create-first-csite')</p>
                </div>

            @endif
        </div>
    </div>
</div>
@endsection
