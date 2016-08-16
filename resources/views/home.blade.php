@extends('layouts.app')

@section('body-class', 'blue-pink')

@section('body')
    <header class="header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <tag data-shuffle>damien.is</tag><span data-shuffle>/coding</span>
                    </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Project</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>

    <footer class="footer">
        <div class="container-fluid">
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <ul class="list-unstyled">
                        <li>Damien Criado</li>
                        <li><a href="mailto:hello@damien.is">hello@damien.is</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <ul class="list-unstyled">
                        <li><a href="https://github.com/damiencriado" target="_blank">GitHub</a></li>
                        <li><a href="http://stackshare.io/damiencriado" target="_blank">StackShare</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <ul class="list-unstyled">
                        <li><a href="https://twitter.com/damiencriado" target="_blank">Twitter</a></li>
                        <li><a href="https://linkedin.com/in/damiencriado" target="_blank">LinkedIn</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <ul class="list-unstyled">
                        <li><a href="http://www.yka.ch/" target="_blank">Lead Developer at<br>YKA SAS</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection
