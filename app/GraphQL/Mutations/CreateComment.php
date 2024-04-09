<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Comment;

/*

mutation {
  createComment(input: {
    content:"Test content",
    title: "Test title",
    post_id: 2
  }) {
    id
    title
    created_at
    user {
      id
      name
    }
  }
}

 */
final readonly class CreateComment
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        // Comment mit übergebenen Daten erstellen
        return Comment::create($args + ['user_id' => auth()->id()]);
    }
}
