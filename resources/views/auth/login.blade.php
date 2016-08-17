@extends('layouts.app')

@section('body-class', 'alt-6')

@section('is', '/sudo')

@section('body')
    @include('layouts.header')

    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <h1>Sudo</h1>
                    <a href="{{ route('auth.oauth', 'github') }}">> Connect with GitHub</a>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')
@endsection
