<div class="form-group row">
    @if($label) <label class="{{$labelClass}} col-form-label font-weight-bold">{{$label}}</label> @endif
    <div class="{{$inputClass}}">
        <input data-switch="true" data-size="small" {{$value == true ? 'checked' : '' }} name="{{$name}}" type="checkbox" data-on-color="info"/>
    </div>
</div>
