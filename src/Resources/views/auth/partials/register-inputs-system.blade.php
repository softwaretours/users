<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    <label for="last_name" class="col-md-4 control-label">Last name</label>

    <div class="col-md-6">
        {!! Form::text('last_name', isset($edit_user->last_name)? $edit_user->last_name:'', ['id'=>'last_name','class' => 'form-control']) !!}

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('account_source') ? ' has-error' : '' }}">
    <label for="account_source" class="col-md-4 control-label">Registered from</label>

    <div class="col-md-6">
        {!! Form::text('account_source', isset($edit_user->account_source)? $edit_user->account_source:'', ['id'=>'account_source','class' => 'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block"><strong>{{ $errors->first('account_source') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="status" class="col-md-4 control-label">Status</label>

    <div class="col-md-6">
        {!! Form::text('status', isset($edit_user->status)? $edit_user->status:'', ['id'=>'status','class' => 'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('account_id') ? ' has-error' : '' }}">
    <label for="account_id" class="col-md-4 control-label">Account</label>

    <div class="col-md-6">
        {!! Form::text('account_id', isset($edit_user->account_id)? $edit_user->account_id:'', ['id'=>'account_id','class' => 'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block"><strong>{{ $errors->first('account_id') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
    <label for="parent_id" class="col-md-4 control-label">User owner</label>

    <div class="col-md-6">
        {!! Form::text('parent_id', isset($edit_user->parent_id)? $edit_user->parent_id:'', ['id'=>'parent_id','class' => 'form-control']) !!}

        @if ($errors->has('parent_id'))
            <span class="help-block"><strong>{{ $errors->first('parent_id') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('api_key') ? ' has-error' : '' }}">
    <label for="api_key" class="col-md-4 control-label">API Key</label>

    <div class="col-md-6">
        {!! Form::text('api_key', isset($edit_user->api_key)? $edit_user->api_key:'', ['id'=>'api_key','class' => 'form-control']) !!}

        @if ($errors->has('api_key'))
            <span class="help-block"><strong>{{ $errors->first('api_key') }}</strong></span>
        @endif
    </div>
</div>