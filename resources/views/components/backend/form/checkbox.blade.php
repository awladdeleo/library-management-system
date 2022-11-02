<div>
    @if($title)<label for="{{$name}}" class="col-form-label font-weight-bold">{{$title}}</label>@endif

        <span class="switch switch-outline switch-icon switch-info">
            <label>
                <input name="{{$name}}" {{ $isChecked ? 'checked' : '' }} type="checkbox"/>
                <span></span>
            </label>
        </span>

</div>