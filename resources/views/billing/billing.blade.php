@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8">

                @if( Session::has('canceled') )
                    <div class="well">
                        Subscription canceled
                    </div>
                @endif

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

                                    <h3>Subscriptions</h3>

                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Expiring in</th>
                                            <th></th>
                                        </tr>
                                        @if($user->subscribed('main'))
                                            <tr>
                                                <td>21.07.2016.</td>
                                                <td>5 eur</td>
                                                <td>26 days</td>
                                                <td>
                                                    {!! Form::open(['route'=>'cancel-subscription']) !!}
                                                        <button class="btn btn-sm btn-danger">Cancel subscription now</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            <tr class="warning">
                                                <td>20.06.2016.</td>
                                                <td>5 eur</td>
                                                <td>Expired</td>
                                                <td></td>
                                            </tr>
                                            <tr class="warning">
                                                <td>17.05.2016.</td>
                                                <td>6 eur</td>
                                                <td>Expired</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">
                                                    <button class="btn btn-default">Prolong subscription</button>
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
                                                    <button class="btn btn-default">Prolong subscription</button>
                                                </td>
                                            </tr>
                                        @endif
                                    </table>


                                    <h3>Donations</h3>

                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                        <tr class="success">
                                            <td>21.07.2016.</td>
                                            <td>5 eur</td>
                                        </tr>
                                        <tr class="success">
                                            <td>20.06.2016.</td>
                                            <td>5 eur</td>
                                        </tr>
                                        <tr class="success">
                                            <td>17.05.2016.</td>
                                            <td>6 eur</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right">
                                                <button class="btn btn-default">Donate more</button>
                                            </td>
                                        </tr>
                                    </table>

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
