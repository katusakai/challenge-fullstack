<div class="commentBox nested comment-box-grid">
    <div>
        <img class="profilePicture" src="{{ url($nestedComment->user->avatar) }}">
    </div>
    <div>
        <div class="d-flex">
            <strong>{{$nestedComment->user->name}}</strong>
            <small class="text-secondary createdAt  d-none d-md-block">Created at {{ $nestedComment->created_at->format('Y-m-d H:i') }}</small>
            @if($nestedComment->updated_at != $nestedComment->created_at)
                <small class="text-secondary ml-auto d-none d-lg-block">Edited at {{ $nestedComment->updated_at->format('Y-m-d H:i') }}</small>
            @endif
        </div>
        <div>
            {{$nestedComment->text}}
        </div>
    </div>
</div>