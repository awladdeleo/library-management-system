<div class="row">
    <div class="{{$className}}">
        <button type="submit"
                class="btn btn-info mr-2 form_submit_btn">{{ $submit }}</button>
        @if($reset)<button type="reset" class="btn btn-secondary">{{ $reset }}</button>@endif
    </div>
</div>