<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a valid IPv4 address', function (): void {
    // Act & Assert
    assertion('192.168.1.1')->validIp();
})->throwsNoExceptions();

it('passes when value is a valid IPv6 address', function (): void {
    // Act & Assert
    assertion('::1')->validIp();
})->throwsNoExceptions();

it('fails when value is an invalid IP address', function (): void {
    // Act & Assert
    assertion('999.999.999.999')->validIp();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid IP address. Got: '999.999.999.999'"
);

it('fails when value is a non-IP string', function (): void {
    // Act & Assert
    assertion('not-ip')->validIp();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid IP address. Got: 'not-ip'"
);

it('passes with assertionNot when value is not a valid IP', function (): void {
    // Act & Assert
    assertionNot('not-ip')->validIp();
})->throwsNoExceptions();

it('fails with assertionNot when value is a valid IP', function (): void {
    // Act & Assert
    assertionNot('192.168.1.1')->validIp();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-IP value. Got: '192.168.1.1'"
);
