@extends('layouts.html')

@section('content')

    <div class="col-sm-3 col-md-2 sidebar">

    </div>

    <div class="col-sm-8 col-md-10">
        <div class="page-header">
            <h1><?=isset($titles->h1) ? $titles->h1 : 'Add user'?></h1>
        </div>
        <div class="page-content">
            {!! Form::open(['route' => ['users.store'], 'class' => 'form-horizontal']) !!}

            @include('auth.partials.register-inputs-email')
            @include('auth.partials.register-inputs-passwords')
            @include('auth.partials.register-inputs-name')
            @include('auth.partials.register-inputs-system')
            @include('auth.partials.register-submit',array('text'=>'Register'))


            {!! Form::close() !!}

        </div>

    </div>

@endsection