<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('common.DeleteTitle')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(array('id'=>'deleteForm', 'method'=>'delete','class'=>'has_loader')) !!}

            <div class="modal-body">
                {{ $slot }}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('common.Close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('common.Delete') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
