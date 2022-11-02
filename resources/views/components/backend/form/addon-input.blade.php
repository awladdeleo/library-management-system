<div class="form-group mb-0">
   @if($title) <label for="{{$name}}" class="col-form-label font-weight-bold {{$labelClass}}">{{ $title }}</label> @endif
    <div class="{{ $inputClass }}">
        <input type="text" value="{{$value}}" name="{{$name}}" class="numeric_value form-control {{$required ? 'field-validate' : ''}} {{$errors->has($name) ? 'is-invalid' :'' }}"
               aria-describedby="basic-addon2" id="{{ $name }}">

        @if($errors->has($name))
            <div class="invalid-feedback">{{$errors->first($name)}}</div>
        @endif

        <div class="input-group-append">
            <span class="input-group-text">{{ $placeholder }}</span>
        </div>

    </div>
</div>