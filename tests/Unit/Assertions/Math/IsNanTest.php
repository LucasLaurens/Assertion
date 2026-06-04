<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\assertion;
use function LucasLaurens\Assertion\assertionNot;

it('passes with value is not a number', function (mixed $value): void {
    assertion($value)->nan();
})
    ->with([
        asin(2),
        acos(1.5)
    ])
    ->throwsNoExceptions();

it('fails with foo is not a number', function (): void {
    assertion('foo')->nan();
})->throws(
    InvalidAssertionException::class,
    "Expected value must not be a number"
);

it('passes with foo is not, not a number', function (): void {
    assertionNot('foo')->nan();
})->throwsNoExceptions();

it('fails with value is not, not a number', function (mixed $value): void {
    assertionNot($value)->nan();
})
    ->with([
        asin(2),
        acos(1.5)
    ])
    ->throws(
        InvalidAssertionException::class,
        "Expected value must be a number"
    );
