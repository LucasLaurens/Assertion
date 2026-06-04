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

it('passes with empty iterable or countable classes', function (): void {
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
        new ArrayObject([1, 2, 3, 4, 5])
    )->empty();

    assertion(
        new ArrayIterator([1, 2, 3, 4, 5])
    )->empty();
})->throws(
    InvalidAssertionException::class,
    "Expected an empty value. Got object"
);

it('passes with none empty array', function (): void {
    assertionNot([1, 2, 3, 4, 5])->empty();
})->throwsNoExceptions();

it('passes with none empty string', function (): void {
    assertionNot("foo")->empty();
})->throwsNoExceptions();

it('passes with none empty iterable or countable classes', function (): void {
    assertionNot(
        new ArrayObject([1, 2, 3, 4, 5])
    )->empty();

    assertionNot(
        new ArrayIterator([1, 2, 3, 4, 5])
    )->empty();
})->throwsNoExceptions();

it('fails with empty array', function (): void {
    assertionNot([])->empty();
})->throws(
    InvalidAssertionException::class,
    "Expected a non empty value"
);

it('fails with empty string', function (): void {
    assertionNot("")->empty();
})->throws(
    InvalidAssertionException::class,
    "Expected a non empty value"
);

it('fails with empty iterable or countable classes', function (): void {
    assertionNot(
        new ArrayObject([])
    )->empty();

    assertionNot(
        new ArrayIterator([])
    )->empty();
})->throws(
    InvalidAssertionException::class,
    "Expected a non empty value"
);
