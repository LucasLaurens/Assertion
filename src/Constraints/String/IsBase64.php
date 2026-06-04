<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_string;
use function preg_match;
use function base64_decode;
use function base64_encode;
use function var_export;
use function gettype;

final readonly class IsBase64 extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        if (! is_string($this->actual) || $this->actual === '') {
            return false;
        }

        if (preg_match('/^[a-zA-Z0-9+\/]*={0,2}$/', $this->actual) !== 1) {
            return false;
        }

        $decoded = base64_decode($this->actual, strict: true);

        return $decoded !== false && base64_encode($decoded) === $this->actual;
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                is_string($this->actual) ? var_export($this->actual, true) : gettype($this->actual)
            )
        );
    }
}
