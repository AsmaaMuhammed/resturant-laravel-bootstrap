<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select name="category" required class="form-control" id="category">
            @foreach (json_decode('{"1": "About", "2": "Menue", "3": "Events", "4": "Services", "5": "Blog", "6": "News", "7": "Contact"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($generaldesc->category) && $generaldesc->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'title' }}</label>
    <div class="col-md-6">
        <input class="form-control" required name="title" type="text" id="title" value="{{ $generaldesc->title or ''}}">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('desc') ? 'has-error' : ''}}">
    <label for="desc" class="col-md-4 control-label">{{ 'Desc' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" required rows="5" name="desc" type="textarea"
                  id="desc">{{ $generaldesc->desc or ''}}</textarea>
        {!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
