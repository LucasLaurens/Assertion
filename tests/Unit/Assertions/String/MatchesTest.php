<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string matches the pattern', function (): void {
    // Act & Assert
    assertion('123')->stringMatches('/^\d+$/');
})->throwsNoExceptions();

it('fails when string does not match the pattern', function (): void {
    // Act & Assert
    assertion('abc')->stringMatches('/^\d+$/');
})->throws(
    InvalidAssertionException::class,
    'Expected string to match pattern "/^\d+$/". Got: \'abc\''
);

it('passes with assertionNot when string does not match the pattern', function (): void {
    // Act & Assert
    assertionNot('abc')->stringMatches('/^\d+$/');
})->throwsNoExceptions();

it('fails with assertionNot when string matches the pattern', function (): void {
    // Act & Assert
    assertionNot('123')->stringMatches('/^\d+$/');
})->throws(
    InvalidAssertionException::class,
    'Expected string not to match pattern "/^\d+$/". Got: \'123\''
);
