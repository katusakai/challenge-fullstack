<form action="{{route('mainComment.store')}}" name="main_comment" method="post">
    @CSRF
    <div>
        <textarea name="text" placeholder="Add a comment" class="form-control no-border">{{ old('text') }}</textarea>
            @error('text')
                    <strong>{{ $message }}</strong>
            @enderror
    </div>
    <div class="dropdown-divider"></div>
    <div>
        <button type="submit" name="submit" class="btn btn-success btn-sm">Post</button>
    </div>
</form>