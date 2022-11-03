<div class="form-group row">
    @if($title) <label for="{{$name}}"
                       class="col-form-label font-weight-bold {{$labelClass}}">{{ $title }} <span class="text-danger">{{$required ? '*' : ''}}</span></label> @endif
    <div class="{{$inputClass}}" id="{{$name}}" >

        <input type="text" readonly="readonly" class="form-control form-control-solid datetimepicker-input {{$errors->has($name) ? 'is-invalid' :'' }}"
               id="kt_datetimepicker_5" name="{{ $name }}" data-toggle="datetimepicker"
               data-target="#kt_datetimepicker_5" />

        @if($errors->has($name))
            <div class="invalid-feedback">{{$errors->first($name)}}</div>
        @endif

        <span class="form-text text-muted ">{{ $placeholder }}</span>
    </div>
</div>


