<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainCommentsCount = 30;
        $nestedCommentsCount = 50;

        factory(Comment::class, $mainCommentsCount)->create();
        factory(Comment::class, $nestedCommentsCount)->create()->each(
            function ($nestedComment) use ($mainCommentsCount) {
                $nested_comment_id = random_int(1,$mainCommentsCount);
                $nestedComment->nested_comment_id = $nested_comment_id;
                $nestedComment->save();
            }
        );
    }
}
