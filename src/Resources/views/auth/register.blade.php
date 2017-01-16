@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            @include('auth.partials.register-inputs-name')
                            @include('auth.partials.register-inputs-email')
                            @include('auth.partials.register-inputs-passwords')
                            @include('auth.partials.register-submit',array('text'=>'Register'))

                        </form>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        Alredy have an account? <a class="" href="{{ url('/login') }}"> Log in</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
