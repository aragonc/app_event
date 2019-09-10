
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <span class="form-required">*</span>
            {{ Form::label('name', __('Name')) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', __('E-Mail Address')) }}
            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', __('Password')) }}
            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password-confirm', __('Confirm Password')) }}
            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password-confirm']) }}
        </div>

    </div>
    <div class="col-md-4">


    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::submit(__('Register'), ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</div>
