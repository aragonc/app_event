
<div class="row">
    <div class="col-md-8">

        <div class="form-group">
            {{ Form::label('category_id', 'Categoria') }}
            <select name="category_id" id="category_id" class="custom-select">
                <option> ---- Escoge una categoria ---- </option>
                @if(isset($event))
                    @foreach($categories as $item)
                        <option {{ $event->category_id == $item->id ? "selected" : "" }} value="{{ $item->id }}"> {{ $item->name }}</option>
                    @endforeach
                @else
                    @foreach($categories as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('title', 'Titulo del evento') }}
                    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('date', 'Fecha del evento') }}
                    {{ Form::text('date', null, ['class' => 'form-control', 'id' => 'date']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('slug', 'Slug para URL') }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('place', 'Lugar del evento') }}
                    {{ Form::text('place', null, ['class' => 'form-control', 'id' => 'place']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('contact_email', 'Email contacto') }}
                    {{ Form::text('contact_email', null, ['class' => 'form-control', 'id' => 'contact_email']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('contact_phone', 'Télefono / WhatsApp') }}
                    {{ Form::text('contact_phone', null, ['class' => 'form-control', 'id' => 'contact_phone']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    @php
                        if(isset($event)){
                            $colorPrimary = ($event->primary_color === null) ? '#3e15b9' : $event->primary_color;
                        } else {
                            $colorPrimary = null;
                        }
                    @endphp
                    {{ Form::label('primary_color', 'Color primario') }}
                    {{ Form::input('color','primary_color',$colorPrimary, array('class' => 'form-control','id' => 'primary_color')) }}
                </div>

                <div class="form-group">
                    @php
                        if(isset($event)){
                            $colorSecondary = ($event->secondary_color === null) ? '#ff6c00' : $event->secondary_color;
                        } else {
                            $colorSecondary = null;
                        }
                    @endphp
                    {{ Form::label('secondary_color', 'Color secundario') }}
                    {{ Form::input('color','secondary_color',$colorSecondary, array('class' => 'form-control','id' => 'secondary_color')) }}
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('brochure', 'URL del brochure (https://)') }}
                    {{ Form::text('brochure', null, ['class' => 'form-control', 'id' => 'brochure']) }}
                </div>
            </div>
            <div class="col-md-6">
                @php
                    if(isset($event)){
                        $colorEmail = ($event->email_color === null) ? '#ededed' : $event->email_color;
                    } else {
                        $colorEmail = null;
                    }
                @endphp
                {{ Form::label('email_color', 'Color de fondo email') }}
                {{ Form::input('color','email_color',$colorEmail, array('class' => 'form-control','id' => 'email_color')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('thematic', 'Descripción del evento') }}
            {{ Form::textarea('thematic', null, ['class' => 'form-control ckeditor', 'id' => 'thematic']) }}
        </div>
        <div class="form-group">
            {{ Form::label('schedule', 'Agenda/Horario') }}
            {{ Form::textarea('schedule', null, ['class' => 'form-control ckeditor', 'id' => 'schedule']) }}
        </div>

        <div class="form-group">
            {{ Form::label('contact', 'Ficha contacto') }}
            {{ Form::textarea('contact', null, ['class' => 'form-control ckeditor', 'id' => 'contact']) }}
        </div>

        <div class="form-group">
            {{ Form::label('terms', 'Términos y condiciones') }}
            {{ Form::textarea('terms', null, ['class' => 'form-control ckeditor', 'id' => 'terms']) }}
        </div>

        <div class="form-group">
            {{ Form::label('content', 'Contenido para email') }}
            {{ Form::textarea('content', null, ['class' => 'form-control ckeditor', 'id' => 'content']) }}
        </div>

        <div class="form-group">
            <div class="form-check form-check-inline">
                {{ Form::radio('status', 'published', true, ['class' => 'form-check-input', 'id' => 'status-published']) }}
                {{ Form::label('status-published','Publicado', ['class' => 'form-check-label']) }}
            </div>
            <div class="form-check form-check-inline">
                {{ Form::radio('status', 'draft', null, ['class' => 'form-check-input', 'id' => 'status-draft']) }}
                {{ Form::label('status-draft','No publicado', ['class' => 'form-check-label']) }}
            </div>
        </div>
    </div>
    <div class="col-md-4">

        @if(isset($event->image_top))
            <div class="card card-image">
                <div class="card-body">
                    <div class="image-event">
                        <img src="{{ Storage::url($event->image_top) }}"  class="img-fluid"/>
                    </div>
                    <div class="form-group form-check check-delete">
                        <input name="delete_top" type="checkbox" value="true" class="form-check-input" id="delete_image_top">
                        <label class="form-check-label" for="delete_image_top">Eliminar esta imagen</label>
                    </div>
                </div>
            </div>
        @else
            <div class="form-group">
                {{ Form::label('image_top', 'Imagen de fondo superior') }}
                <div class="custom-file">
                    {{ Form::file('image_top', ['class' => '', 'id' => 'image_top']) }}
                </div>
                <small class="form-text text-muted">La imagen debe ser de 1440 x 1024 pixeles.</small>
            </div>
        @endif

        @if(isset($event->image_bottom))
            <div class="card card-image">
                <div class="card-body">
                    <div class="image-event">
                        <img src="{{ Storage::url($event->image_bottom) }}"  class="img-fluid"/>
                    </div>
                    <div class="form-group form-check check-delete">
                        <input name="delete_bottom" type="checkbox" value="true" class="form-check-input" id="delete_image_bottom">
                        <label class="form-check-label" for="delete_image_bottom">Eliminar esta imagen</label>
                    </div>
                </div>
            </div>
        @else
            <div class="form-group">
                {{ Form::label('image_bottom', 'Imagen de fondo inferior') }}
                <div class="custom-file">
                    {{ Form::file('image_bottom', ['class' => '', 'id' => 'image_bottom']) }}
                </div>
                <small class="form-text text-muted">La imagen debe ser de 1440 x 1024 pixeles.</small>
            </div>
        @endif

        @if(isset($event->media))
            <div class="card card-image">
                <div class="card-body">
                    <div class="image-announcement">
                        <img src="{{ Storage::url($event->media) }}"  class="img-fluid"/>
                    </div>
                    <div class="form-group form-check check-delete">
                        <input name="delete_media" type="checkbox" value="true" class="form-check-input" id="delete_media">
                        <label class="form-check-label" for="delete_media">Eliminar esta imagen</label>
                    </div>
                </div>
            </div>
        @else
            <div class="form-group">
                {{ Form::label('media', 'Cargar imagen') }}
                <div class="custom-file">
                    {{ Form::file('media', ['class' => '', 'id' => 'image_upload']) }}
                </div>
                <small class="form-text text-muted">Subir una imagen debe ser de 600 x 144 pixeles .</small>
            </div>
        @endif

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::submit('Guardar evento', ['class' => 'btn btn-success btn-block']) }}
        </div>
    </div>
</div>
