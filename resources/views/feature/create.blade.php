<!-- Modal Register Billings -->
<input id="url" type="hidden" value="{{ url('admin/feature/') }}">
<div class="modal fade" id="modal_features" tabindex="-1" role="dialog" aria-labelledby="features_create" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">{{ __('Add feature') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['id' => 'frmFeatures', 'files' => false]) !!}

                    <div class="form-group">
                        {{ Form::label('feature_title', 'Título de característica') }}
                        {{ Form::text('feature_title', null, ['class' => 'form-control', 'id' => 'feature_title']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('feature_icon', 'Icono') }}
                        {{ Form::text('feature_icon', null, ['class' => 'form-control', 'id' => 'feature_icon']) }}
                        <small>Deberás colocar la clase css del icono que deseas obtener, desde <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">FontAwesome v4.7</a>
                            ejemplo: <strong>"fa-envelope-open"</strong> que trae al icono <i class="fa fa-envelope-open" aria-hidden="true"></i>
                        </small>
                    </div>

                    <div class="form-group">
                        {{ Form::label('feature_content', 'Descripción') }}
                        {{ Form::textarea('feature_content', null, ['class' => 'form-control', 'id' => 'feature_content']) }}
                    </div>

                    {{ Form::hidden('event_id', $event->id, ['id' => 'event_id', ]) }}
                    {{ Form::hidden('feature_id', 0, ['id' => 'feature_id', ]) }}

                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                    <button type="submit" id="btn-save" class="btn btn-primary">{{ __('Guardar') }}</button>
                </div>
            </div>

    </div>
</div>