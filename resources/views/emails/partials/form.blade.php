
<div class="row">
    <div class="col-md-8">

        <div class="form-group">
            {{ Form::label('event_id', 'Evento') }}
            <select name="event_id" id="event_id" class="custom-select">
                <option> ---- Escoge un evento ---- </option>
                @if(isset($email))
                    @foreach($events as $item)
                        <option {{ $email->event_id == $item->id ? "selected" : "" }} value="{{ $item->id }}"> {{ $item->title }}</option>
                    @endforeach
                @else
                    @foreach($events as $item)
                        <option value="{{ $item->id }}"> {{ $item->title }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <span class="form-required">*</span>
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
        </div>
        <div class="form-group">
            {{ Form::label('brochure', 'URL del brochure (https://)') }}
            {{ Form::text('brochure', null, ['class' => 'form-control', 'id' => 'brochure']) }}
        </div>
        <div class="form-group">
            {{ Form::label('content', 'Contenido') }}
            {{ Form::textarea('content', null, ['class' => 'form-control ckeditor', 'id' => 'content']) }}
        </div>

    </div>
    <div class="col-md-4">

        @if(isset($email->image))
            <div class="card card-image">
                <div class="card-body">
                    <div class="image-announcement">
                        <img src="{{ Storage::url($email->image) }}"  class="img-fluid"/>
                    </div>
                    <div class="form-group form-check check-delete">
                        <input name="delete_image" type="checkbox" value="true" class="form-check-input" id="delete_image">
                        <label class="form-check-label" for="delete_image">Eliminar esta imagen</label>
                    </div>
                </div>
            </div>
        @else
            <div class="form-group">
                {{ Form::label('media', 'Cargar imagen') }}
                <div class="custom-file">
                    {{ Form::file('media', ['class' => '', 'id' => 'image_upload']) }}
                </div>
                <small class="form-text text-muted">Subir una imagen debe ser de 425 x 90 pixeles .</small>
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
