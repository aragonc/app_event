
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
        <div class="form-group">
            {{ Form::label('image', 'Cargar imagen') }}
            <div class="custom-file">
                {{ Form::file('image', ['class' => '', 'id' => 'image_upload']) }}
            </div>
        </div>

        @if(isset($category->image))
            <div class="image-announcement">
                <img src="{{ Storage::url($category->image) }}"  class="img-fluid"/>
            </div>
        @else

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
