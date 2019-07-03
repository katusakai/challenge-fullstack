<form name="nested_comment" method="post">
    @CSRF
    <div>
        <input type="text" name="nested_comment_id" required="required" hidden value="{{ $comment->id }}">
    </div>
    <div>
        <textarea name="text" required="required" class="form-control no-border" placeholder="Comment a comment"></textarea>
    </div>
    <div class="dropdown-divider"></div>
    <div>
        <button type="submit" name="submit" class="btn btn-success btn-sm">Post</button>
    </div>
</form>