<div class="shadow p-3 mb-5 bg-white rounded">
    <div class="commentBox comment-box-grid">
        <div><img class="profilePicture" src="{{ url('https://lh3.googleusercontent.com/-6oueg6X3xd8/AAAAAAAAAAI/AAAAAAAABHY/VFA6vMB1WGs/photo.jpg') }}" alt=""></div>
        <div>
            <div>Tadas Janca
                <small class="text-secondary createdAt">Created at {{ date('Y-m-d H:i') }}</small>
                <small class="text-secondary float-right">Edited at {{ date('Y-m-d H:i') }}</small>
            </div>
            <div>
                {{'Chuck Norris once killed a bear just by looking at it. When Chuck Norris goes fishing, he does not use bait nor rod. He comes near river, tells fishes to stand in line and count.'}}
            </div>

            @for($i = 0; $i < 4; $i++)
                @include('comments.nested')
            @endfor
            <div>
                <a href="javascript:void(0)" class="text-primary commentsToggler" data-mainComment="{{ 1 }}">Replies ({{ 3 }})</a>
                <a href="javascript:void(0)" class="text-primary nestedCommentFormToggler" data-mainComment="{{ 2 }}">Comment</a>
            </div>
            <div id="nested-comment-form-container-{{ 2 }}">
                @include('comments.nestedCommentForm')
            </div>
        </div>
    </div>
    <div class="dropdown-divider"></div>
    <div>
        @include('comments.mainCommentForm')
    </div>
</div>

