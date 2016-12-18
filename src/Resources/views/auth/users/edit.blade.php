@extends('layouts.html')

@section('content')

    <div class="col-sm-3 col-md-2 sidebar">

    </div>

    <div class="col-sm-8 col-md-10">
        <div class="page-header">
            <a class="btn btn-default pull-right crud-button" href="{{ route('users.create') }}">Create new </a>
            <h1><?=isset($titles->h1) ? $titles->h1 : 'Edit user'?></h1>
        </div>
        <div class="page-content">

            {!! Form::open(['route'=>['users.update',$edit_user->id],'class'=>'form-horizontal','method'=>'put'])!!}

            @include('auth.partials.register-inputs-email',array('disabled'=>'disabled'))
            @include('auth.partials.register-inputs-name')
            @include('auth.partials.register-inputs-system')
            @include('auth.partials.register-submit',array('text'=>'Update'))

            {!! Form::close() !!}

        </div>

    </div>

@endsection