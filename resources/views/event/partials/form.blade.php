
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            {{ Form::label('category_id', 'Escuela') }}
            <select name="category_id" id="category_id" class="custom-select">
                <option> --- Escoge una escuela ----</option>
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
        <div class="form-group">
            {{ Form::label('title', 'Titulo del evento') }}
            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
        </div>
        <div class="form-group">
            {{ Form::label('slug', 'Slug para URL') }}
            {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
        </div>
        <div class="form-group">
            {{ Form::label('date', 'Fecha del evento') }}
            {{ Form::text('date', null, ['class' => 'form-control', 'id' => 'date']) }}
        </div>
        <div class="form-group">
            {{ Form::label('place', 'Lugar del evento') }}
            {{ Form::text('place', null, ['class' => 'form-control', 'id' => 'place']) }}
        </div>
        <div class="form-group">
            {{ Form::label('thematic', 'Ficha temática') }}
            {{ Form::textarea('thematic', null, ['class' => 'form-control ckeditor', 'id' => 'thematic']) }}
        </div>
        <div class="form-group">
            {{ Form::label('schedule', 'Ficha horario') }}
            {{ Form::textarea('schedule', null, ['class' => 'form-control ckeditor', 'id' => 'schedule']) }}
        </div>
        <div class="form-group">
            {{ Form::label('contact', 'Ficha contacto') }}
            {{ Form::textarea('contact', null, ['class' => 'form-control ckeditor', 'id' => 'contact']) }}
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                {{ Form::radio('status', 'publicado', true, ['class' => 'form-check-input', 'id' => 'status-published']) }}
                {{ Form::label('status-published','Publicado', ['class' => 'form-check-label']) }}

            </div>
            <div class="form-check form-check-inline">
                {{ Form::radio('status', 'borrador', null, ['class' => 'form-check-input', 'id' => 'status-draft']) }}
                {{ Form::label('status-draft','Borrador', ['class' => 'form-check-label']) }}

            </div>
        </div>
    </div>
    <div class="col-md-4">

        @if(isset($event->background_top))
            <div class="image-event">
                <img src="{{ Storage::url($event->background_top) }}"  class="img-fluid"/>
            </div>
            <div class="form-group form-check">
                <input name="delete_top" type="checkbox" value="true" class="form-check-input" id="delete_background_top">
                <label class="form-check-label" for="delete_background_top">Eliminar esta imagen</label>
            </div>
        @else
            <div class="form-group">
                {{ Form::label('background_top', 'Imagen de fondo superior') }}
                <div class="custom-file">
                    {{ Form::file('background_top', ['class' => '', 'id' => 'background_top']) }}
                </div>
            </div>
        @endif


        @if(isset($event->background_bottom))
            <div class="image-event">
                <img src="{{ Storage::url($event->background_bottom) }}"  class="img-fluid"/>
            </div>
            <div class="form-group form-check">
                <input name="delete_bottom" type="checkbox" value="true" class="form-check-input" id="delete_background_bottom">
                <label class="form-check-label" for="delete_background_bottom">Eliminar esta imagen</label>
            </div>
        @else
            <div class="form-group">
                {{ Form::label('background_bottom', 'Imagen de fondo inferior') }}
                <div class="custom-file">
                    {{ Form::file('background_bottom', ['class' => '', 'id' => 'background_bottom']) }}
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
