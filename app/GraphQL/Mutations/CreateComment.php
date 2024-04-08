<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Comment;

final readonly class CreateComment
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $comment = new Comment();
        $comment->content = $args['content'];
        $comment->post_id = $args['post_id'];
        $comment->user_id = auth()->id();
        $comment->save();
        return $comment;
    }
}
