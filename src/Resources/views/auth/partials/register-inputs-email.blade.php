<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
        {!! Form::email('email', isset($edit_user->email)? $edit_user->email:'', ['id'=>'email','class' => 'form-control',isset($disabled)? 'disabled':'' ]) !!}

        @if ($errors->has('email'))
            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
    </div>
</div>