@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Subscription
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/public/"><i class="fa fa-building"></i> Construction Manager</a>
                </li>
                <li class="active">Subscription</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">


        <div class="col-sm-6">
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
            test text
        </div>
        <div class="col-sm-6">
            @include('includes.pricing-plans')
        </div>


    </div>
</div>
@endsection
