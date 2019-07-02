<form name="main_comment" method="post">
    @CSRF
    <div>
        <input type="text" id="main_comment_userId" name="main_comment[userId]" required="required" hidden="" value="12">
    </div>
    <div>
        <textarea id="main_comment_text" name="main_comment[text]" required="required" placeholder="Add a comment" class="form-control no-border"></textarea>
    </div>
    <div class="dropdown-divider"></div>
    <div>
        <button type="submit" id="main_comment_submit" name="main_comment[submit]" class="btn btn-success btn-sm">Post</button>
    </div>
    <div>
        <input type="datetime-local" id="main_comment_createdAt" name="main_comment[createdAt]" required="required" hidden="" value="2019-07-02T18:19:09">
    </div>
</form>