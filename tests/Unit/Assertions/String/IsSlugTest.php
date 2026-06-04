<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a valid slug', function (): void {
    // Act & Assert
    assertion('hello-world')->slug();
})->throwsNoExceptions();

it('passes when value is a slug with digits', function (): void {
    // Act & Assert
    assertion('my-slug-123')->slug();
})->throwsNoExceptions();

it('fails when value contains uppercase letters', function (): void {
    // Act & Assert
    assertion('Hello-World')->slug();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid slug (lowercase letters, digits, and hyphens). Got: 'Hello-World'"
);

it('fails when value contains spaces', function (): void {
    // Act & Assert
    assertion('hello world')->slug();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid slug (lowercase letters, digits, and hyphens). Got: 'hello world'"
);

it('passes with assertionNot when value is not a valid slug', function (): void {
    // Act & Assert
    assertionNot('Hello-World')->slug();
})->throwsNoExceptions();

it('fails with assertionNot when value is a valid slug', function (): void {
    // Act & Assert
    assertionNot('hello-world')->slug();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-slug value. Got: 'hello-world'"
);
