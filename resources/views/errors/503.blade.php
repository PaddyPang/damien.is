@extends('layouts.app')

@section('body-class', 'alt-5')

@section('body')
    @include('layouts.header-without-menu')

    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <h1>Be right back.</h1>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')
@endsection
