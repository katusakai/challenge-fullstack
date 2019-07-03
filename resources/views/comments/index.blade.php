<div class="shadow p-3 mb-5 bg-white rounded">
    @foreach($comments as $comment)
        <div class="commentBox comment-box-grid">
            <div><img class="profilePicture" src="{{ url($comment->user->avatar) }}" alt=""></div>
            <div>
                <div>
                    {{$comment->user->name}}
                    <small class="text-secondary createdAt">Created at {{ $comment->created_at->format('Y-m-d H:i') }}</small>
                    @if($comment->updated_at)
                        <small class="text-secondary float-right">Edited at {{  $comment->updated_at->format('Y-m-d H:i') }}</small>
                    @endif
                </div>
                <div>
                    {{$comment->text}}
                </div>
                @foreach($comment->nestedComments as $nestedComment)
                    @include('comments.nested')
                @endforeach
                <div>
                    <a href="javascript:void(0)" class="text-primary commentsToggler" data-mainComment="{{ $comment->id }}">Replies ({{ 3 }})</a>
                    <a href="javascript:void(0)" class="text-primary nestedCommentFormToggler" data-mainComment="{{ $comment->id }}">Comment</a>
                </div>
                <div id="nested-comment-form-container-{{ $comment->id }}">
                    @include('comments.nestedCommentForm')
                </div>
            </div>
        </div>
        <div class="dropdown-divider"></div>
    @endforeach
    <div>
        @include('comments.mainCommentForm')
    </div>
</div>

