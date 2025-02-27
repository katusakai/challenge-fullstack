<?php


namespace App\Aggregators;


use App\Comment;

class Comments
{
    public $mainComments;

    private $nestedComments;

    public $sortedComments;

    /**
     * Comments constructor.
     * @param $mainComments
     * @param $nestedComments
     */
    public function __construct()
    {
        $this->mainComments = Comment::where('nested_comment_id', null)->orderBy('created_at', 'desc')->paginate(10);
        $this->nestedComments = Comment::all()->where('nested_comment_id', !null)->sortByDesc('created_at');
        $this->sort();
    }

    public function sort()
    {
        $sortedComments = [];

        foreach ($this->mainComments as $mainComment) {
            $sortedComments[] = $mainComment;

            $nestedComments = [];
            $mainComment->nestedComments = [];
            foreach ($this->nestedComments as $nestedComment) {
                if ($nestedComment->nested_comment_id == $mainComment->id) {
                    $nestedComments[] = $nestedComment;
                }
            $mainComment->nestedComments = $nestedComments;
            }
        }
        $this->sortedComments = $sortedComments;
    }
}