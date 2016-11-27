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
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>Like Construction Manager?</strong> <a href="#" class="alert-link">Donate developers</a> for new features!
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">

      <form action="{{ route('post.checkout') }}" method="POST" id="payment-form">
        {{ csrf_field() }}
        <input type="hidden" value="" id="stripeToken" name="stripeToken" value="0">
        <span class="payment-errors"></span>

        <div class="form-row">
          <label>
            <span>Card Number</span>
            <input type="text" size="20" data-stripe="number" value="4242424242424242">
          </label>
        </div>

        <div class="form-row">
          <label>
            <span>Expiration (MM/YY)</span>
            <input type="text" size="2" data-stripe="exp_month" value="12">
          </label>
          <span> / </span>
          <input type="text" size="2" data-stripe="exp_year" value="2016">
        </div>

        <div class="form-row">
          <label>
            <span>CVC</span>
            <input type="text" size="4" data-stripe="cvc" value="123">
          </label>
        </div>


        <input type="submit" class="submit" value="Submit Payment">
      </form>
    </div>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

</div>
@endsection
