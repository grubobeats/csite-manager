@extends('layouts.app')

@section('content')
    <div class="container">
        @if( Session::has('canceled') )
            @include('includes.deleted', ['message'=>'You canceled your subscription.'])
        @endif

        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Billing</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="panel panel-default">
                                <div class="panel-body">

                                    <h3>Subscription</h3>

                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Expiring in</th>
                                            <th></th>
                                        </tr>

                                        @if($user->subscribed('main'))
                                            <tr>
                                                <td>{{ $user->subscription('main')->created_at->format('d-m-Y') }}</td>
                                                <td>5 eur</td>
                                                <td>{{ $user->subscription('main')->ends_at }}</td>
                                                <td align="right">
                                                    {!! Form::open(['route'=>'cancel-subscription']) !!}
                                                        <button class="btn btn-sm btn-danger">Cancel subscription now</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="warning">
                                                <td colspan="4">
                                                    Your subscription expired.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right">
                                                    <a href="{{  route('checkout') }}" class="btn btn-default">Make subscription</a>
                                                </td>
                                            </tr>
                                        @endif
                                    </table>


                                    <h3>Donations</h3>
                                    @if(count($donations) > 0)
                                        <table class="table table-responsive">
                                            <tr>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                            @foreach($donations as $donation)
                                                <tr class="success">
                                                    <td>{{ $donation->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $donation->amount }} <i class="fa fa-eur" aria-hidden="true"></i></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" align="right">
                                                    <button class="btn btn-success"><i class="fa fa-heart" aria-hidden="true"></i> Donate more</button>
                                                </td>
                                            </tr>
                                        </table>
                                    @else
                                        <div class="jumbotron text-center alert-warning">
                                            <i class="fa fa-frown-o fa-5x" aria-hidden="true"></i>
                                            <h2>You don't have donations yet, <a href="#">click to make</a> donation</h2>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings">4</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
