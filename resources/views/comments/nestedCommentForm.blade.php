<form name="nested_comment" method="post" hidden id="nested-comment-form">
    @CSRF
    <div>
        <input type="text" id="nested_comment_userId" name="nested_comment[userId]" required="required" hidden="" value="12">
    </div>
    <div>
        <input type="text" id="nested_comment_nestedCommentId" name="nested_comment[nestedCommentId]" required="required" hidden="">
    </div>
    <div>
        <textarea id="nested_comment_text" name="nested_comment[text]" required="required" class="form-control no-border" placeholder="Comment a comment"></textarea>
    </div>
    <div class="dropdown-divider"></div>
    <div>
        <button type="submit" id="nested_comment_submit" name="nested_comment[submit]" class="btn btn-success btn-sm">Post</button>
    </div>
    <div>
        <input type="datetime-local" id="nested_comment_createdAt" name="nested_comment[createdAt]" required="required" hidden="" value="2019-07-02T18:25:56">
    </div>
</form>