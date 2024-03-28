<?php

declare(strict_types=1);

use ArrayObject;

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with empty array', function (): void {
    assertion([])->empty();
})->throwsNoExceptions();

it('passes with empty string', function (): void {
    assertion("")->empty();
})->throwsNoExceptions();

it('passes with iterable class', function (): void {
    assertion(new EmptyIterator())->empty();
})->throwsNoExceptions();

it('passes with iterable or countable classes', function (): void {
    assertion(new ArrayObject())->empty();
    assertion(new ArrayIterator())->empty();
})->throwsNoExceptions();

it('fails with array contains 5 items', function (): void {
    assertion([1, 2, 3, 4, 5])->empty();
})->throws(
    InvalidAssertionException::class,
    "Expected an empty value. Got array"
);

it('fails with non empty string', function (): void {
    assertion("foo")->empty();
})->throws(
    InvalidAssertionException::class,
    "Expected an empty value. Got string"
);

it('fails with iterable or countable classes', function (): void {
    assertion(
        new ArrayObject(
            [1, 2, 3, 4, 5],
            ArrayObject::STD_PROP_LIST
        )
    )->empty();

    assertion(
        new ArrayIterator(
            [1, 2, 3, 4, 5]
        )
    )->empty();
})->throws(
    InvalidAssertionException::class,
    "Expected an empty value. Got object"
);

/** @todo make tests for assertion not */
