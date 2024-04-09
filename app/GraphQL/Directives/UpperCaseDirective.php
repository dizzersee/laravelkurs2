<?php declare(strict_types=1);

namespace App\GraphQL\Directives;

use Nuwave\Lighthouse\Execution\ResolveInfo;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldMiddleware;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class UpperCaseDirective extends BaseDirective implements FieldMiddleware
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
directive @upperCase on FIELD_DEFINITION
GRAPHQL;
    }

    public function handleField(FieldValue $fieldValue): void
    {
        $fieldValue->wrapResolver(fn (callable $resolver): \Closure => function (mixed $root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) use ($fieldValue, $resolver) {

            $userId = auth()->id();

            $result = $resolver($root, $args, $context, $resolveInfo);

            if (is_string($result)) {
                return strtoupper($result) . " (User ID: $userId)";
            }

            return $result;
        });
    }
}
