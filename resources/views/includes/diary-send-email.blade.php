<div class="col-sm-offset-8 col-sm-4 well data-holder send-email text-center">
    <button type="button" class="close close-info">&times;</button>
    {!! Form::open(['route' => ['mail.send.diary', $diary->id, $construction_site->id], 'files'=>true]) !!}

    <div class="row">
        <div class="col-sm-12">
            <div class="form-inline">
                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('forms.recipients-email')]) }}
                <button type="submit" class="btn btn-primary haveLoader">@lang('view-diary.send-on-email')</button>
                <br>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>