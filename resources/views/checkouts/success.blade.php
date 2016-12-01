@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if(Session::has('donated'))
                    <div class="jumbotron alert-success text-center">
                        <h1><i class="fa fa-heart fa-x5" aria-hidden="true"></i></h1>
                        <h1>Thank you for your donation!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est id ipsa officiis porro voluptatem. A accusantium consectetur dicta distinctio eius nemo quis quos. Atque eos fuga illum impedit reiciendis soluta!</p>
                    </div>
                @elseif(Session::has('subscribed'))
                    <div class="jumbotron alert-success text-center">
                        <h1><i class="fa fa-check-circle fa-x5" aria-hidden="true"></i></h1>
                        <h1>Thank you for your payment!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est id ipsa officiis porro voluptatem. A accusantium consectetur dicta distinctio eius nemo quis quos. Atque eos fuga illum impedit reiciendis soluta!</p>
                    </div>
                @else
                    <div class="jumbotron alert-danger text-center">
                        <h1><i class="fa fa-exclamation-triangle fa-x5" aria-hidden="true"></i></h1>
                        <h1>Error during your payment</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est id ipsa officiis porro voluptatem. A accusantium consectetur dicta distinctio eius nemo quis quos. Atque eos fuga illum impedit reiciendis soluta!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
