<div class="form-group row">
    @if($title) <label for="{{ $name }}"
           class="col-form-label font-weight-bold {{$labelClass}}">{{ $title }}
        <span class="text-danger">{{$required ? '*' : ''}}</span> </label> @endif
    <div class="{{ $inputClass }}">
        <input type="{{$type}}" name="{{$name}}"
               class="form-control {{$className}} {{$required ? 'field-validate' : ''}} {{$errors->has($name) ? 'is-invalid' :'' }}"
               id="{{$name == 'color' ? 'example-color-input' : $name}}" value="{{$value}}">

        @if($errors->has($name))
            <div class="invalid-feedback">{{$errors->first($name)}}</div>
        @endif

        <span class="form-text text-muted ">{{ $placeholder }}</span>

    </div>
</div>