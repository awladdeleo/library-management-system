<div class="form-group row">
    @if($title)<label class="col-form-label font-weight-bold col-md-2 col-sm-3 text-md-right">{{ $title }}
        <span class="text-danger">{{$required ? '*' : ''}}</span> </label>@endif
    <div class="col-md-6 col-sm-7">
        <div class="image-input image-input-empty image-input-outline {{$errors->has('image') ? 'is-invalid' :'' }}" id="kt_image_5"
             style="background-image: url({{$value ?? asset('backend/media/users/blank.png')}})">
            <div class="image-input-wrapper"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                   data-action="{{__('common.Change')}}" data-toggle="tooltip" title=""
                   data-original-title="{{__('common.ChangeImage')}}">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input class="{{$required ? 'field-validate' : ''}} image-field" type="file"
                       name="image" accept=".png, .jpg, .jpeg"/>
                <input type="hidden" name="image_remove"/>
            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                  data-action="{{__('common.Cancel')}}" data-toggle="tooltip" title="{{__('common.CancelImage')}}">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                  data-action="{{__('common.Remove')}}" data-toggle="tooltip" title="{{__('common.RemoveImage')}}">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
        </div>

        @if($errors->has('image'))
            <div class="invalid-feedback">{{$errors->first('image')}}</div>
        @endif

        <span class="form-text text-muted">{{ $placeholder }}</span>
    </div>


</div>

@push('script')
    <script type="text/javascript">
        var avatar5 = new KTImageInput('kt_image_5');
    </script>
@endpush