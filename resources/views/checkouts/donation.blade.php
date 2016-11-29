@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Donation
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-sm-6">
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi beatae culpa, cupiditate dolor eligendi ex excepturi expedita illo mollitia neque placeat quibusdam repudiandae voluptas? Asperiores deserunt earum eligendi ratione sit?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid delectus distinctio illo iste nisi perferendis quas vel. Aperiam corporis ea explicabo placeat qui. Accusantium aliquam aperiam earum necessitatibus perferendis quidem.lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum natus, voluptates? Aliquid amet corporis dolore doloribus ipsa mollitia natus nemo nisi nulla porro quaerat quis recusandae reiciendis repellendus, similique sunt.</p>
        </div>
        <div class="col-sm-6">
            @include('includes.donation-form')
        </div>
    </div>
</div>
@endsection
