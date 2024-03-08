<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Contracts;

interface Assertable
{
    public function null(): void;

    public function instanceOf(string $fqcn): void;

    public function string(): void;

    public function integer(): void;

    public function boolean(): void;

    public function mustBeArray(): void;

    public function count(int $expected): void;

    public function greaterThan(int $limit): void;

    public function lessThan(int $limit): void;

    public function equal(mixed $expected): void;

    public function list(): void;

    public function stringStartsWith(string $expected): void;
}
