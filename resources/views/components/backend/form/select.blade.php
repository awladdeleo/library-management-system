<div class="form-group row">

    @if($title) <label for="{{$name}}"
                       class="col-form-label font-weight-bold {{ $labelClass }}">{{ $title }}  <span class="text-danger">{{$required ? '*' : ''}}</span></label> @endif

    <div class="@if($errors->has($name)) div-invalid @endif {{ $inputClass }}">
        @if($name == 'book_name')
            <select class="form-control select2 @if($errors->has('book_name')) is-invalid @endif"
                    id="kt_select2_3" name="book_name[]" multiple="multiple">

                @foreach($option as $item)
                    <option {{in_array($item->id,old('book_name',$value ? $value : [])) ? 'selected' : ''}} value="{{$item->id}}">{{$item->title}}</option>
                @endforeach

            </select>
        @else
            <select x-ref="select" style="width: 100%" name="{{$name}}" id="{{$name}}"
                    class="form-control select2 {{$required ? 'field-validate' : ''}} @if($errors->has($name)) is-invalid @endif"
                    data-size="7" data-live-search="true" id="{{ $name }}">
                @if(isset($optionText) && $optionText!=null)
                    <option {{$value == 0 ? 'selected' :''}} value="">{{$optionText}}</option>@endif
                @foreach($option as $key => $val)
                    <option {{$value == $val->id ? 'selected' :''}} value="{{$val->id}}">{{ $val->name }} ({{ $val->email }})</option>
                @endforeach
            </select>
        @endif

        @if($errors->has($name))
            <div class="invalid-feedback">{{$errors->first($name)}}</div>
        @endif

        <span class="form-text text-muted ">{{ $placeholder }}</span>

    </div>

</div>