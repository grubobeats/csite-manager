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

        @if($subscription)
            <h1>subscribed</h1>
        @else
            <h1>not subscribed</h1>
        @endif

      <form action="{{ route('subscription.checkout') }}" method="POST" id="payment-form">
        {{ csrf_field() }}

          <script
              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="pk_test_jnQoANlW94gaHnZ8LXl7V6AH"
              data-amount="500"
              data-name="Subscription"
              data-description="Premium plan"
              data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
              data-locale="auto"
              data-allow-remember-me="false"
              data-email="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
          </script>
      </form>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>Stripe.setPublishableKey('pk_test_jnQoANlW94gaHnZ8LXl7V6AH');</script>
@endsection