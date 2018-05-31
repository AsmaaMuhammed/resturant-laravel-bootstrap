<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" required name="title" type="text" id="title" value="{{ $news->title or ''}}">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('desc') ? 'has-error' : ''}}">
    <label for="desc" class="col-md-4 control-label">{{ 'Desc' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" required rows="5" name="desc" type="textarea" id="desc">{{ $news->desc or ''}}</textarea>
        {!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="col-md-4 control-label">{{ 'Photo' }}</label>
    <div class="col-md-6">
        <input id="photo" {{!isset($news)?'required':''}} required name="photo" type="file">
        @if(isset($news))
            <img src="{{ url('storage/'.$news->photo) }}" width="100%" height="50%" alt="" title="" />
        @endif
        <button class="btn btn-default" id="reset-image-uploader" type="button">reset</button>
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
