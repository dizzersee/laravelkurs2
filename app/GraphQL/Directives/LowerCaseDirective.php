<?php declare(strict_types=1);

namespace App\GraphQL\Directives;

use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Support\Contracts\ArgDirective;
use Nuwave\Lighthouse\Support\Contracts\ArgTransformerDirective;

final class LowerCaseDirective extends BaseDirective implements ArgDirective, ArgTransformerDirective
{

    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
directive @lowerCase on ARGUMENT_DEFINITION | INPUT_FIELD_DEFINITION
GRAPHQL;
    }

    /**
     * Apply transformations on the value of an argument given to a field.
     *
     * @param  mixed  $argumentValue  the client given value
     *
     * @return mixed the transformed value
     */
    public function transform(mixed $argumentValue): mixed
    {
        if (is_string($argumentValue)) {
            return strtolower($argumentValue);
        }

        return $argumentValue;
    }
}
