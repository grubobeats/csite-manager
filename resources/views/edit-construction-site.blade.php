@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Construction Manager <small>v1.0.0</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/"><i class="fa fa-building"></i> Construction Manager</a>
                </li>
                <li>
                    Dashboard
                </li>
                <li class="active">
                    Add Construction Site
                </li>
            </ol>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add new construction site
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('edited-csite', $construction_site->id) }}" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $construction_site->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{ $construction_site->city }}">
                                </div>
                                <div class="form-group">
                                    <label for="city">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $construction_site->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="city">Investor</label>
                                    <input type="text" class="form-control" id="investor" placeholder="Investor" name="investor" value="{{ $construction_site->investor }}">
                                </div>
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-default">Submit</button>
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
