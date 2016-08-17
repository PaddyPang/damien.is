@extends('layouts.app')

@section('body-class', 'alt-1')

@section('is', '/coding')

@section('body')
    @include('layouts.header')

    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <h1>Building app, experimenting with new web technologies.</h1>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <img class="damien" src="{{ Bust::url('/images/damien.jpg') }}">
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')
@endsection
