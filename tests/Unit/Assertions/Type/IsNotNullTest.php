<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is not null', function (): void {
    // Act & Assert
    assertion('foo')->notNull();
})->throwsNoExceptions();

it('fails when value is null', function (): void {
    // Act & Assert
    assertion(null)->notNull();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-null value'
);

it('passes with assertionNot when value is null', function (): void {
    // Act & Assert
    assertionNot(null)->notNull();
})->throwsNoExceptions();

it('fails with assertionNot when value is not null', function (): void {
    // Act & Assert
    assertionNot('foo')->notNull();
})->throws(
    InvalidAssertionException::class,
    'Expected null. Got: null'
);
