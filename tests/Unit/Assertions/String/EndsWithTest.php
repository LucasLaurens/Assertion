<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with foo bar ends with bar', function (): void {
    assertion('foo bar')->stringEndsWith('bar');
})->throwsNoExceptions();

it('fails with foo bar ends with foo', function (): void {
    assertion('foo bar')->stringEndsWith('foo');
})->throws(
    InvalidAssertionException::class,
    "Expected a value to ends with foo. Got: bar"
);

it('passes with foo bar not ends with foo', function (): void {
    assertionNot('foo bar')->stringEndsWith('foo');
})->throwsNoExceptions();

it('fails with foo bar not ends with bar', function (): void {
    assertionNot('foo bar')->stringEndsWith('bar');
})->throws(
    InvalidAssertionException::class,
    "Expected a value not to ends with bar"
);
