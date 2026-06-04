<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\assertion;
use function LucasLaurens\Assertion\assertionNot;

it('passes with foo bar baz contains bar', function (): void {
    assertion('foo bar baz')->stringContains('bar');
})->throwsNoExceptions();

it('fails with foo baz bar contains bar', function (): void {
    assertion('foo baz')->stringContains('bar');
})->throws(
    InvalidAssertionException::class,
    "Expected a value to contains bar"
);

it('passes with foo baz not contains bar', function (): void {
    assertionNot('foo baz')->stringContains('bar');
})->throwsNoExceptions();

it('fails with foo bar not contains bar', function (): void {
    assertionNot('foo bar')->stringContains('bar');
})->throws(
    InvalidAssertionException::class,
    "Expected a value not to contains bar"
);
