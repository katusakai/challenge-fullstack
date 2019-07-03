<div class="commentBox nested comment-box-grid">
    <div>
        <img class="profilePicture" src="{{ url($nestedComment->user->avatar) }}">
    </div>
    <div>
        <div>
            {{$nestedComment->user->name}}
            <small class="text-secondary createdAt">Created at {{ $nestedComment->created_at->format('Y-m-d H:i') }}</small>
            @if($nestedComment->updated_at)
                <small class="text-secondary float-right">Edited at {{ $nestedComment->updated_at->format('Y-m-d H:i') }}</small>
            @endif
        </div>
        <div>
            {{$nestedComment->text}}
        </div>
    </div>
</div>