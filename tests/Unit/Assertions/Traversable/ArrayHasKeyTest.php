<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with assertion array has the expected key', function (): void {
    assertion(['foo' => 'bar'])->arrayHasKey('foo');
})->throwsNoExceptions();

it('fails with assertion array has the expected key', function (): void {
    assertion(['foo' => 'bar'])->arrayHasKey('bar');
})->throws(
    InvalidAssertionException::class,
    "Expected the key bar to exist"
);

it('passes with assertion array has not the expected key', function (): void {
    assertionNot(['foo' => 'bar'])->arrayHasKey('bar');
})->throwsNoExceptions();

it('fails with assertion array has not the expected key', function (): void {
    assertionNot(['foo' => 'bar'])->arrayHasKey('foo');
})->throws(
    InvalidAssertionException::class,
    "Expected the key foo to not exist"
);
