<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Comment;

final readonly class CreateComment
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        // Comment mit übergebenen Daten erstellen
        return Comment::create($args + ['user_id' => auth()->id()]);
    }
}
