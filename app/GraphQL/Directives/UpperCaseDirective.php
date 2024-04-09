<?php declare(strict_types=1);

namespace App\GraphQL\Directives;

use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldMiddleware;

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
        // 1. *code vor dem resolver ausführen, zum beispiel irgendwas vorbereiten
        // 2. *den eigentlichen resolver ausführen
        // 3. *nach dem eigentlichen resolver das ergebnis nochmal verändern
    }
}
