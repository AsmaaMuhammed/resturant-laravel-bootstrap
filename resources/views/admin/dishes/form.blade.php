<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" required name="title" type="text" id="title" value="{{ $dish->title or ''}}">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="col-md-4 control-label">{{ 'price' }}</label>
    <div class="col-md-6">
        <input class="form-control" required name="price" type="number" id="price" value="{{ $dish->price or ''}}">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('desc') ? 'has-error' : ''}}">
    <label for="desc" class="col-md-4 control-label">{{ 'Desc' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="desc" type="textarea" id="desc">{{ $dish->desc or ''}}</textarea>
        {!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="col-md-4 control-label">{{ 'Photo' }}</label>
    <div class="col-md-6">
        <input id="photo" {{!isset($dish)?'required':''}} name="photo" type="file">
        @if(isset($dish))
            <img src="{{ url('storage/'.$dish->photo) }}" width="100%" height="50%" alt="" title="" />
        @endif
        <button class="btn btn-default" id="reset-image-uploader" type="button">reset</button>
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select name="category" required class="form-control" id="category">
            @foreach (json_decode('{"1": "Breakfast", "2": "Lunch", "3": "Dinner", "4": "Dessert"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($dish->category) && $dish->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
