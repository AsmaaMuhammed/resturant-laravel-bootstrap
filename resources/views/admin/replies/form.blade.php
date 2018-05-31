<div class="form-group {{ $errors->has('comments_id') ? 'has-error' : ''}}">
    <label for="comments_id" class="col-md-4 control-label">{{ 'Comments Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="comments_id" type="number" id="comments_id" value="{{ $reply->comments_id or ''}}" >
        {!! $errors->first('comments_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('replay') ? 'has-error' : ''}}">
    <label for="replay" class="col-md-4 control-label">{{ 'Replay' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="replay" type="textarea" id="replay" >{{ $reply->replay or ''}}</textarea>
        {!! $errors->first('replay', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
