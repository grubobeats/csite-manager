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
                        <li role="presentation" class="active"><a href="#donations" aria-controls="donations" role="tab" data-toggle="tab">Donations</a></li>
                        <li role="presentation"><a href="#subscription" aria-controls="subscription" role="tab" data-toggle="tab">Subscription</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="donations">
                            <div class="panel panel-default">
                                <div class="panel-body">
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
                                                    All donations: {{ $all_donations }} <i class="fa fa-eur" aria-hidden="true"></i>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" align="right">
                                                    <a href="{{ route('donation') }}" class="btn btn-success"><i class="fa fa-heart" aria-hidden="true"></i> Donate more</a>
                                                </td>
                                            </tr>

                                        </table>
                                    @else
                                        <div class="jumbotron text-center alert-warning">
                                            <i class="fa fa-frown-o fa-5x" aria-hidden="true"></i>
                                            <h2>You did not made any donations yet <br><a href="{{ route('donation') }}">click to make</a> one now</h2>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="subscription">
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
                                                    You are not subscribed.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right">
                                                    <a href="{{  route('checkout') }}" class="btn btn-default"><i class="fa fa-check" aria-hidden="true"></i> Make subscription</a>
                                                </td>
                                            </tr>
                                        @endif
                                    </table>
                            </div>
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="settings">4</div>
                </div>
            </div>
        </div>
    </div>
@endsection
