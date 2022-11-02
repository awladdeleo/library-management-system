<div class="form-group row">
    @if($title) <label for="{{$name}}"
                       class="{{$labelClass}} font-weight-bold">{{ $title }} <span class="text-danger">{{$required ? '*' : ''}}</span>
    </label> @endif
    <div class="{{$inputClass}}">
        <textarea style="resize: none" name="{{$name}}" rows="5" class="{{$class}} form-control {{$required ? 'field-validate' : ''}} {{$errors->has($name) ? 'is-invalid' :'' }}" id="{{$name}}">{{$value}}</textarea>

        @if($errors->has($name))
            <div class="invalid-feedback">{{$errors->first($name)}}</div>
        @endif

        <span class="form-text text-muted ">{{ $placeholder }}</span>

    </div>
</div>