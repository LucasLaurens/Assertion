<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with foo bar starts with foo', function (): void {
    assertion('foo bar')->stringStartsWith('foo');
})->throwsNoExceptions();

it('fails with foo bar starts with bar', function (): void {
    assertion('foo bar')->stringStartsWith('bar');
})->throws(
    InvalidAssertionException::class,
    "Expected a value to starts with bar. Got: foo"
);

it('passes with foo bar not starts with bar', function (): void {
    assertionNot('foo bar')->stringStartsWith('bar');
})->throwsNoExceptions();

it('fails with foo bar not starts with foo', function (): void {
    assertionNot('foo bar')->stringStartsWith('foo');
})->throws(
    InvalidAssertionException::class,
    "Expected a value not to starts with foo"
);
