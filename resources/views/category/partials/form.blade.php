
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <span class="form-required">*</span>
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
        </div>
        <div class="form-group">
            {{ Form::label('url', 'URL (https://)') }}
            {{ Form::text('url', null, ['class' => 'form-control', 'id' => 'url']) }}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Descripción') }}
            {{ Form::textarea('description', null, ['class' => 'form-control ckeditor', 'id' => 'description']) }}
        </div>

    </div>
    <div class="col-md-4">

        @if(isset($category->image))
            <div class="card card-image">
                <div class="card-body">
                    <div class="image-announcement">
                        <img src="{{ Storage::url($category->image) }}"  class="img-fluid"/>
                    </div>
                    <div class="form-group form-check check-delete">
                        <input name="delete_image" type="checkbox" value="true" class="form-check-input" id="delete_image">
                        <label class="form-check-label" for="delete_image">Eliminar esta imagen</label>
                    </div>
                </div>
            </div>
        @else
            <div class="form-group">
                {{ Form::label('image', 'Cargar imagen') }}
                <div class="custom-file">
                    {{ Form::file('image', ['class' => '', 'id' => 'image_upload']) }}
                </div>
            </div>
        @endif

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</div>
