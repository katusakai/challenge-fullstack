<div class="shadow p-3 mb-5 bg-white rounded">
    @foreach($comments as $comment)
        <div class="commentBox comment-box-grid">
            <div><img class="profilePicture" src="{{ url($comment->user->avatar) }}" alt=""></div>
            <div>
                <div>
                    {{$comment->user->name}}
                    <small class="text-secondary createdAt">Created at {{ $comment->created_at->format('Y-m-d H:i') }}</small>
                    @if($comment->updated_at !== $comment->created_at)
                        <small class="text-secondary float-right">Edited at {{  $comment->updated_at->format('Y-m-d H:i') }}</small>
                    @endif
                </div>
                <div>
                    {{$comment->text}}
                </div>
                <div id="nestedComments-{{$comment->id}}" hidden>
                    @foreach($comment->nestedComments as $nestedComment)
                        @include('comments.nested')
                    @endforeach
                </div>
                <div>
                    <a href="javascript:void(0)" class="text-primary commentsToggler" data-mainComment="{{ $comment->id }}">Replies ({{ count($comment->nestedComments) }})</a>
                    @if(auth()->user())
                        <a href="javascript:void(0)" class="text-primary nestedCommentFormToggler" data-mainComment="{{ $comment->id }}">Comment</a>
                    @endif
                </div>
                @if(auth()->user())
                    <div id="nested-comment-form-{{ $comment->id }}" hidden>
                        @include('comments.nestedCommentForm')
                    </div>
                @endif
            </div>
        </div>
        <div class="dropdown-divider"></div>
    @endforeach
    @if(auth()->user())
        <div>
            @include('comments.mainCommentForm')
        </div>
    @endif
</div>
