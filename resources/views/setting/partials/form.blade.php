@if($setting->variable != 'app_logo')
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
@else
    @if(isset($setting->value))
        <div class="card card-image">
            <div class="card-body">
                <div class="image-announcement">
                    <img src="{{ Storage::url($setting->value) }}"  class="img-fluid"/>
                </div>
                <div class="form-group form-check check-delete">
                    <input type="hidden" name="value" value="{{ $setting->value }}">
                    <input name="delete_image" type="checkbox" value="true" class="form-check-input" id="delete_image">
                    <label class="form-check-label" for="delete_image">Eliminar esta imagen</label>
                </div>
                <div class="form-group">
                    {{ Form::submit('Guardar evento', ['class' => 'btn btn-success']) }}
                </div>
            </div>
        </div>

    @else
        <div class="form-group">
            <input type="hidden" name="variable" value="{{ $setting->display_text }}">
            {{ Form::label('image', 'Cargar el ' . $setting->display_text) }}
            <div class="custom-file">
                {{ Form::file('image', ['class' => '', 'id' => 'image_upload']) }}
            </div>
            <small class="form-text text-muted">Subir una imagen debe ser de 300 x 110 pixeles .</small>
        </div>
        <div class="form-group">
            {{ Form::submit('Guardar evento', ['class' => 'btn btn-success']) }}
        </div>
    @endif
@endif
