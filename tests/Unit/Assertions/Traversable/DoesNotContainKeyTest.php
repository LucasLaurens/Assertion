<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when array does not contain the key', function (): void {
    // Act & Assert
    assertion(['bar' => 1])->doesNotContainKey('foo');
})->throwsNoExceptions();

it('fails when array contains the key', function (): void {
    // Act & Assert
    assertion(['foo' => 1])->doesNotContainKey('foo');
})->throws(
    InvalidAssertionException::class,
    'Expected the key foo to not exist'
);

it('passes with assertionNot when array contains the key', function (): void {
    // Act & Assert
    assertionNot(['foo' => 1])->doesNotContainKey('foo');
})->throwsNoExceptions();

it('fails with assertionNot when array does not contain the key', function (): void {
    // Act & Assert
    assertionNot(['bar' => 1])->doesNotContainKey('foo');
})->throws(
    InvalidAssertionException::class,
    'Expected the key foo to exist'
);
