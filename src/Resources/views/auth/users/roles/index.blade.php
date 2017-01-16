@extends('layouts.html')

@section('scripts_js')
    <script src="{{URL::asset('assets/js/ajax.js')}}"></script>
    <script src="{{URL::asset('assets/js/products/form-update.js')}}"></script>
    <script src="{{URL::asset('assets/js/users/rolesPermissions.js')}}"></script>
    <script>
        var $url = "{{route('users.roles.update')}}";
        var changePermissionUrl = "{{route('roles.changePermission')}}";
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    @permission('users.index')
                    <a class="btn btn-default pull-right" href="{{ route('users.index') }}">All users </a>
                    @endpermission
                    <h1><?=isset( $titles->h1 ) ? $titles->h1 : 'Page title'?></h1>
                </div>

                {!! Form::open(['route'=>['users.roles.update'],'class'=>'form-horizontal','method'=>'put', 'id' => 'roles_update'])!!}

                <div class="row">

                    <div class="col-md-12">

                        <ul class="nav nav-tabs">
                            @for($i=0;$i<count($roles);$i++)
                                <li role="presentation" class="{{$i==0?'active in':''}}">
                                    <a data-toggle="pill" href="#roles-{{$i}}">{{$roles[$i]['name']}}</a></li>
                            @endfor
                        </ul>
                    {{--</div>--}}
                    {{--<div class="col-md-9">--}}
                        <div class="tab-content">
                            @for($i=0;$i<count($roles);$i++)
                                <div id="roles-{{$i}}" class="tab-pane {{$i==0?'active':''}}">
                                    <br>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="col-md-4">Permission group</th>
                                            <th class="col-md-5">Permissions</th>
                                            <th class="col-md-2 text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles[$i]['permissionGroups'] as $pGroup)
                                            <tr>
                                                <td>
                                                    <label class="control-label" for="name">{{$pGroup['name']}}</label>
                                                    <div class="secondary-text">{{$pGroup['description']}}</div>
                                                </td>
												<? $permission = isset( $pGroup['permissions'][0] ) ? $pGroup['permissions'][0] : null; ?>
                                                @if(isset($permission))
                                                    <td class="{{$permission['hasPermission']==1?'success':'danger'}}">
                                                        {{$permission['name']}}
                                                    </td>
                                                    <td class="{{$permission['hasPermission']==1?'success':'danger'}} text-right">
                                                        <a href="javascript:" class="changePermission {{$permission['hasPermission']==1?'not-active':'active'}}" data-role-id="{{$roles[$i]['id']}}" data-permission-id="{{$permission['id']}}" data-has-permission="1">Enable</a> &nbsp;&nbsp;
                                                        <a href="javascript:" class="changePermission {{$permission['hasPermission']==0?'not-active':'active'}}" data-role-id="{{$roles[$i]['id']}}" data-permission-id="{{$permission['id']}}" data-has-permission="0">Disable</a>
                                                    </td>
													<?
													unset( $pGroup['permissions'][0] );
													$pGroup['permissions'] = array_values( $pGroup['permissions'] );
													?>
                                                @endif

                                            </tr>
                                            @foreach($pGroup['permissions'] as $permission)
                                                <tr>
                                                    <td style="border-top: 0;">&nbsp;</td>
                                                    <td class="{{$permission['hasPermission']==1?'success':'danger'}}">
                                                        {{$permission['name']}}
                                                    </td>
                                                    <td class="{{$permission['hasPermission']==1?'success':'danger'}} text-right">
                                                        <a href="javascript:" class="changePermission {{$permission['hasPermission']==1?'not-active':'active'}}" data-role-id="{{$roles[$i]['id']}}" data-permission-id="{{$permission['id']}}" data-has-permission="1">Enable</a> &nbsp;&nbsp;
                                                        <a href="javascript:" class="changePermission {{$permission['hasPermission']==0?'not-active':'active'}}" data-role-id="{{$roles[$i]['id']}}" data-permission-id="{{$permission['id']}}" data-has-permission="0">Disable</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            @endfor

                        </div>
                    </div>
                    <hr>

                    <div class="row text-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    {{ Form::close() }}

                </div>

            </div>
        </div>
    </div>
@endsection