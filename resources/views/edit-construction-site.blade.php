@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($errors) > 0)
        @include('includes.error-handler', ['message'=>trans('global.csite-error')])
    @endif
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Construction Manager <small>v1.0.0</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/public/"><i class="fa fa-building"></i> Construction Manager</a>
                </li>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">
                    @lang('forms.add-new-csite')
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
                    @lang('forms.add-new-csite')
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('edited-csite', $construction_site->id) }}" method="post">
                                <div class="form-group">
                                    <label for="name">@lang('forms.name')</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $construction_site->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="city">@lang('forms.city')</label>
                                    <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{ $construction_site->city }}">
                                </div>
                                <div class="form-group">
                                    <label for="city">@lang('forms.address')</label>
                                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $construction_site->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="city">@lang('forms.investor')</label>
                                    <input type="text" class="form-control haveLoader" id="investor" placeholder="Investor" name="investor" value="{{ $construction_site->investor }}">
                                </div>
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-default">@lang('forms.save-csite')</button>
                            </form>
                        </div>
                        <div class="col-sm-6 text-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
