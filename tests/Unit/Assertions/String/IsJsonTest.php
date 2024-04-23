<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\assertion;

use function LucasLaurens\Assertion\assertionNot;

it('passes with assertion is of json type', function (): void {
    assertion('{"foo": "bar"}')->validJson();
})->throwsNoExceptions();

it('fails with assertion is a only a string', function (): void {
    assertion('foo')->validJson();
})->throws(
    InvalidAssertionException::class,
    "Expected the value to be of type json"
);

it('passes with assertion is not a valid json', function (): void {
    assertionNot('foo')->validJson();
})->throwsNoExceptions();

it('fails with assertion is not a valid json', function (): void {
    assertionNot('{"foo": "bar"}')->validJson();
})->throws(
    InvalidAssertionException::class,
    "Expected the value not to be of type json"
);
