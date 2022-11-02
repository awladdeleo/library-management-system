<div class="form-group">
    @if($title) <label for="{{$name}}"
                       class="col-form-label font-weight-bold {{$labelClass}}">{{ $title }}</label> @endif
    <div class="{{$inputClass}}" id="{{$name}}" data-target-input="nearest">

        <div class="input-group date ">
            <input type="text" name="{{$name}}" class="form-control datetimepicker-input {{$errors->has($name) ? 'is-invalid' :'' }}" placeholder="yyyy-mm-dd"
                   data-target="#{{$name}}" value="{{ $value }}"/>
            <div class="input-group-append" data-target="#{{$name}}" data-toggle="datetimepicker">
                <span class="input-group-text"><i class="ki ki-calendar"></i></span>
            </div>

            @if($errors->has($name))
                <div class="invalid-feedback">{{$errors->first($name)}}</div>
            @endif

        </div>

        <span class="form-text text-muted ">{{ __('common.SelectDate') }}</span>
    </div>
</div>


