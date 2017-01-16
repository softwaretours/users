@extends('layouts.html')

@section('scripts_js')
    <script src="{{URL::asset('assets/js/ajax.js')}}"></script>
    <script src="{{URL::asset('assets/js/products/form-update.js')}}"></script>
    <script>
        var $url = "{{route('users.permissions.update')}}";
    </script>
@endsection

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            @permission('users.index')
            <a class="btn btn-default pull-right crud-button"
               href="{{ route('users.index') }}">All users </a>
            @endpermission
            <h1><?=isset($titles->h1) ? $titles->h1 : 'All users'?></h1>
        </div>


        <div class="row">
            <hr>
            <? $crud = ['Create', 'Update', 'View', 'Delete', 'Check All']; ?>
            <div class="col-sm-2 text-left" style="border-right: 1px solid rgb(160,160,255);;">
                <h4>Actions</h4>
                @foreach($crud as $c)
                    <div class="form-check">
                        <label class="form-check-label check_label">
                            {{$c}}
                        </label>
                    </div>
                @endforeach
            </div>
            {!! Form::open(['route'=>['users.permissions.update'],'class'=>'form-horizontal','method'=>'put', 'id' => 'permissions_update'])!!}
            {{ Form::hidden('user_id', $permission_user->id) }}

            @foreach($permission_groups as $pg)
                <div class="col-sm-2 text-center">
                    <h4>{{$pg->name}}</h4>
                    @foreach($permissions as $p)
                        @if($p->permission_group_id == $pg->id)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input check_perm"  type="checkbox" name="{{$p->slug}}" id="{{$p->slug}}" value="1" aria-label="..." @if($permission_user->can($p->slug))) checked="checked" @endif>
                                </label>
                            </div>
                        @endif
                    @endforeach
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input check_perm"  type="checkbox" name="all_{{ strtolower($pg->key)}}" id="all_{{strtolower($pg->key)}}" value="1" aria-label="...">
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row text-right">
            <hr>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        {{ Form::close() }}
    </div>




@endsection