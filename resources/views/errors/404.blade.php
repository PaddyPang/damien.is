@extends('layouts.app')

@section('body-class', 'alt-5')

@section('is', '/searching')

@section('body')
    @include('layouts.header')

    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <h1>This page does not exist.</h1>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')
@endsection
