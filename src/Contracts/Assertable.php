<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Contracts;

interface Assertable
{
    // Type assertions
    public function null(): void;

    public function notNull(): void;

    public function instanceOf(string $fqcn): void;

    public function string(): void;

    public function integer(): void;

    public function float(): void;

    public function boolean(): void;

    public function mustBeArray(): void;

    public function object(): void;

    public function scalar(): void;

    public function numeric(): void;

    public function iterable(): void;

    public function countable(): void;

    // Boolean assertions
    public function true(): void;

    public function false(): void;

    public function truthy(): void;

    public function falsy(): void;

    // Equality assertions
    public function equal(mixed $expected): void;

    // Cardinality / numeric assertions
    public function count(int $expected): void;

    public function greaterThan(int $limit): void;

    public function lessThan(int $limit): void;

    // Numeric value assertions
    public function positive(): void;

    public function negative(): void;

    public function zero(): void;

    public function greaterThanOrEqualTo(int|float $limit): void;

    public function lessThanOrEqualTo(int|float $limit): void;

    public function between(int|float $min, int|float $max): void;

    public function odd(): void;

    public function even(): void;

    public function divisibleBy(int|float $divisor): void;

    // Math
    public function nan(): void;

    // String assertions
    public function stringStartsWith(string $expected): void;

    public function stringEndsWith(string $expected): void;

    public function stringContains(string $expected): void;

    public function stringNotEmpty(): void;

    public function stringLength(int $expected): void;

    public function stringMinLength(int $min): void;

    public function stringMaxLength(int $max): void;

    public function stringMatches(string $pattern): void;

    public function validJson(): void;

    public function validEmail(): void;

    public function validUrl(): void;

    public function validUuid(): void;

    public function uppercase(): void;

    public function lowercase(): void;

    public function alpha(): void;

    public function alphanumeric(): void;

    public function base64(): void;

    public function blank(): void;

    public function notBlank(): void;

    public function validIp(): void;

    public function hexColor(): void;

    public function slug(): void;

    // Empty / misc
    public function empty(): void;

    public function callable(): void;

    // Array / traversable assertions
    public function arrayHasKey(string $key): void;

    public function doesNotContainKey(string|int $key): void;

    public function containsValue(mixed $value): void;

    public function doesNotContainValue(mixed $value): void;

    /** @param array<mixed> $haystack */
    public function inArray(array $haystack): void;

    public function arrayMinCount(int $min): void;

    public function arrayMaxCount(int $max): void;

    public function sorted(): void;

    public function sortedDescending(): void;

    public function unique(): void;

    public function list(): void;
}
