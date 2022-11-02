<div class="form-group row">

    @if($title) <label for="{{$name}}"
                       class="col-form-label font-weight-bold {{ $labelClass }}">{{ $title }}  <span class="text-danger">{{$required ? '*' : ''}}</span></label> @endif

    <div class="@if($errors->has($name)) div-invalid @endif {{ $inputClass }}">
        @if($name == 'tag')
            <select class="form-control select2 @if($errors->has('tag')) is-invalid @endif"
                    id="kt_select2_3" name="tag[]" multiple="multiple">
                @foreach($option as $key=>$tag)
                    <option {{in_array($key,old('tag',$value ? $value : [])) ? 'selected' : ''}} value="{{$tag}}">{{$tag}}</option>
                @endforeach
            </select>
        @else
            <select x-ref="select" style="width: 100%" name="{{$name}}" id="{{$name}}"
                    class="form-control select2 {{$required ? 'field-validate' : ''}} @if($errors->has($name)) is-invalid @endif"
                    data-size="7" data-live-search="true">
                @if(isset($optionText) && $optionText!=null)
                    <option {{$value == 0 ? 'selected' :''}} value="">{{$optionText}}</option>@endif
                @foreach($option as $key => $val)
                    <option {{$value == $key ? 'selected' :''}} value="{{$key}}">{{$val}}</option>
                @endforeach
            </select>
        @endif

        @if($errors->has($name))
            <div class="invalid-feedback">{{$errors->first($name)}}</div>
        @endif

        <span class="form-text text-muted ">{{ $placeholder }}</span>

    </div>

</div>