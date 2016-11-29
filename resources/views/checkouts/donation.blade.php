@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('global.donation')
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-sm-6">
            <div class="divider"></div>
            @lang('global.donation-description')
        </div>
        <div class="col-sm-6">
            @include('includes.donation-form')
        </div>
    </div>
</div>
@endsection
