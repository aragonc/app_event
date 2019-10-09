<!-- Modal Register Billings -->
<div class="modal fade" id="features_create" tabindex="-1" role="dialog" aria-labelledby="features_create" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="formFeature" class="form-horizontal" method="POST" v-on:submit.prevent="createFeature">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="features_modal">{{ __('Add address') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger" v-if="errors.length > 0">
                        <ul>
                            <li v-for="error in errors">@{{ error }}</li>
                        </ul>
                    </div>

                    {{ Form::hidden('event_id', '',['id' => 'event_id', 'v-model' => 'feature.event_id']) }}
                    <div class="form-group">
                        {{ Form::label('ruc', 'N° RUC') }}
                        {{ Form::text('ruc', null, ['class' => 'form-control', 'id' => 'ruc', 'v-model' => 'billings.ruc']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('business_name', 'Razón social') }}
                        {{ Form::text('business_name', null, ['class' => 'form-control', 'id' => 'business_name', 'v-model' => 'billings.business_name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('fiscal_address', 'Dirección fiscal') }}
                        {{ Form::text('fiscal_address', null, ['class' => 'form-control', 'id' => 'fiscal_address' , 'v-model' => 'billings.fiscal_address']) }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>