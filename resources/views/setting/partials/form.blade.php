
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <input type="hidden" name="variable" value="{{ $setting->variable }}">
            {{ Form::label('setting', $setting->display_text) }}
            {{ Form::text('setting', $setting->value, ['class' => 'form-control', 'id' => 'setting']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Guardar evento', ['class' => 'btn btn-success']) }}
        </div>
    </div>
</div>
