<div class="form-group row">
    @if($title) <label for="file"
                       class="{{$labelClass}} col-form-label font-weight-bold">{{ $title }} <span class="text-danger">{{$required ? '*' : ''}}</span></label> @endif
    <div class="{{$inputClass}}">
        <div class="uppy {{$path ? 'd-none' : ''}} mb-2" id="kt_uppy_2">
            <div class="uppy-Root" dir="ltr">
                <div class="uppy-Dashboard uppy-Dashboard--animateOpenClose uppy-size--height-md uppy-Dashboard--isInnerWrapVisible"
                     data-uppy-theme="light" data-uppy-num-acquirers="0" data-uppy-drag-drop-supported="true"
                     aria-hidden="false" aria-label="File Uploader">
                    <div class="uppy-Dashboard-overlay" tabindex="-1"></div>
                    <div class="uppy-Dashboard-inner {{$required ? 'field-validate' : ''}} {{$errors->has($name) ? 'is-invalid' :'' }}">
                        <div class="uppy-Dashboard-innerWrap">
                            <div class="uppy-Dashboard-AddFiles">
                                <div class="uppy-Dashboard-AddFiles-title">{{$placeholder}}
                                    <button type="button" class="uppy-u-reset uppy-Dashboard-browse file-manager" data-toggle="modal"
                                            data-target="#fileManagerModal"
                                            data-uppy-super-focusable="true">Click here
                                    </button>
                                </div>
                                <div class="uppy-Dashboard-AddFiles-info">
                                    <div class="uppy-Dashboard-note">{{$text}}</div>
                                </div>
                            </div>
                            <div class="uppy-Dashboard-progressindicators">
                                <div class="uppy-StatusBar is-waiting" aria-hidden="true">
                                    <div class="uppy-StatusBar-progress
                           " role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"
                                         style="width: 0%;"></div>
                                    <div class="uppy-StatusBar-actions"></div>
                                </div>
                                <div class="uppy uppy-Informer" aria-hidden="true"><p role="alert"></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="image-input image-input-empty image-input-outline mr-4 {{$path ? '' : 'd-none'}} {{$errors->has($name) ? 'is-invalid' :'' }}" id="kt_image_5"
             style="background-image: url({{ $path ? $value : asset('backend/media/unnamed.jpg') }})">
            <div class="image-input-wrapper"></div>

            <input class="image-field d-none" name="{{ $name }}" type="text" value="{{ $path }}"/>

            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow d-block removeImage"
                  data-action="remove" data-toggle="tooltip" title="{{__('common.RemoveImage')}}">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
        </div>

        @if($errors->has($name))
            <span class="text-danger mt-2">{{$errors->first($name)}}</span>
        @endif
    </div>

</div>