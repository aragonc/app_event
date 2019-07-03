
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            {{ Form::label($setting->variable, $setting->display_text) }}
            {{ Form::text($setting->variable, $setting->value, ['class' => 'form-control', 'id' => $setting->variable]) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Guardar evento', ['class' => 'btn btn-success']) }}
        </div>
    </div>
</div>
