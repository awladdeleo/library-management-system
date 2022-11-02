<div class="card-toolbar">
    <form action="{{ $search }}" method="GET" class="has_loader">
        <div class="input-group">
            <input type="text" name="query" class="form-control"
                   value="{{request()->input('query')}}"
                   placeholder="{{ $placeholder }}"
                   aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-info" type="submit" id="button-addon2"><i
                            class="la la-search"></i></button>
            </div>
        </div>
    </form>
    <i class="la la-ellipsis-v la-3x"></i>
    <a href="{{ route('home')}}"
       class="btn btn-default font-weight-bolder font-size-sm mr-1"><i
                class="la la-long-arrow-left"></i> {{ trans('common.Back') }}</a>
    <a href="{{ $buttonUrl }}"
       class="btn btn-info font-weight-bolder font-size-sm"><i
                class="flaticon2-plus-1"></i> {{ $buttonText }}</a>
</div>