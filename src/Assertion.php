<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion;

use LucasLaurens\Assertion\Enums\Type;
use LucasLaurens\Assertion\Contracts\Assertable;
use LucasLaurens\Assertion\Constraints\Boolean\IsBool;
use LucasLaurens\Assertion\Constraints\String\IsString;
use LucasLaurens\Assertion\Constraints\Equality\IsEqual;
use LucasLaurens\Assertion\Constraints\Traversable\IsArray;
use LucasLaurens\Assertion\Constraints\Type\{IsInstanceOf, IsInt, IsNull};
use LucasLaurens\Assertion\Constraints\Cardinality\{Count, GreaterThan, LessThan};
use LucasLaurens\Assertion\Constraints\String\StartsWith;
use LucasLaurens\Assertion\Constraints\Traversable\IsList;

/**
 * @template TValue
 */
final readonly class Assertion implements Assertable
{
    /**
     * Creates a new assertion.
     *
     * @param  TValue  $value
     */
    public function __construct(
        public mixed $value,
        public bool $negative = false
    ) {
    }

    public function null(): void
    {
        (new IsNull(
            $this->value,
            null,
            'Expected null value. Got: %s'
        ))->evaluate();
    }

    public function instanceOf(string $fqcn): void
    {
        (new IsInstanceOf(
            $this->value,
            $fqcn,
            'Expected %s class. Got: %s'
        ))->evaluate();
    }

    public function string(): void
    {
        (new IsString(
            $this->value,
            Type::STRING->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    public function integer(): void
    {
        (new IsInt(
            $this->value,
            Type::INT->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    public function boolean(): void
    {
        (new IsBool(
            $this->value,
            Type::BOOL->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    public function mustBeArray(): void
    {
        (new IsArray(
            $this->value,
            Type::ARRAY->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    public function count(int $expected): void
    {
        (new Count(
            $this->value,
            $expected,
            'Expected an array to contain %d elements. Got: %d'
        ))->evaluate();
    }

    public function greaterThan(int $limit): void
    {
        (new GreaterThan(
            $this->value,
            $limit,
            'Expected a value greater than %d. Got: %d'
        ))->evaluate();
    }

    public function lessThan(int $limit): void
    {
        (new LessThan(
            $this->value,
            $limit,
            'Expected a value less than %d. Got: %d',
        ))->evaluate();
    }

    public function equal(mixed $expected): void
    {
        (new IsEqual(
            $this->value,
            $expected,
            'Expected a value equal to %s. Got: %s'
        ))->evaluate();
    }

    public function list(): void
    {
        (new IsList(
            $this->value,
            Type::BOOL->value,
            'Expected array to be a list'
        ))->evaluate();
    }

    public function stringStartsWith(string $expected): void
    {
        (new StartsWith(
            $this->value,
            $expected,
            'Expected a value to start with %s. Got: %s'
        ))->evaluate();
    }
}
