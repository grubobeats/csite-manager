@extends('layouts.app')

@section('content')
<div class="container">

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
    <div class="row">
        <table class="table table-responsive">
            <tr>
                <td>Your status:</td>
                <td>
                    @if($user->subscribed('main'))
                        <p>subscribed</p>
                    @else
                        <p>not subscribed</p>
                    @endif
                </td>
            </tr>
        </table>



        @include('includes.pricing-plans')


    </div>
</div>
@endsection
