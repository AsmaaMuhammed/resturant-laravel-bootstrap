<div class="form-group {{ $errors->has('social_type') ? 'has-error' : ''}}">
    <label for="social_type" class="col-md-4 control-label">{{ 'Social Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="social_type" type="text" id="social_type" value="{{ $followUs->social_type or ''}}" >
        {!! $errors->first('social_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="col-md-4 control-label">{{ 'Value' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="value" type="text" id="value" value="{{ $followUs->value or ''}}" >
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
