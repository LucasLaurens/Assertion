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
use LucasLaurens\Assertion\Constraints\Traversable\IsList;

/**
 * @template TValue
 */
final readonly class AssertionNot implements Assertable
{
    /**
     * Creates a new assertion not.
     *
     * @param  TValue  $value
     */
    public function __construct(
        public mixed $value
    ) {
    }

    public function null(): void
    {
        (new IsNull(
            $this->value,
            null,
            'Expected a value other than null',
            true
        ))->evaluate();
    }

    public function instanceOf(string $fqcn): void
    {
        (new IsInstanceOf(
            $this->value,
            $fqcn,
            'Expected an instance other than %s',
            true,
        ))->evaluate();
    }

    public function string(): void
    {
        (new IsString(
            $this->value,
            Type::STRING->value,
            'Expected an other value type than %s',
            true
        ))->evaluate();
    }

    public function integer(): void
    {
        (new IsInt(
            $this->value,
            Type::INT->value,
            'Expected an other value type than %s',
            true
        ))->evaluate();
    }

    public function boolean(): void
    {
        (new IsBool(
            $this->value,
            Type::BOOL->value,
            'Expected an other value type than %s',
            true
        ))->evaluate();
    }

    public function mustBeArray(): void
    {
        (new IsArray(
            $this->value,
            Type::ARRAY->value,
            'Expected an other value type than %s',
            true
        ))->evaluate();
    }

    public function count(int $expected): void
    {
        (new Count(
            $this->value,
            $expected,
            'Expected an array not to contain %d elements',
            true
        ))->evaluate();
    }

    public function greaterThan(int $limit): void
    {
        (new GreaterThan(
            $this->value,
            $limit,
            'Expected a value not greater than %d',
            true
        ))->evaluate();
    }

    public function lessThan(int $limit): void
    {
        (new LessThan(
            $this->value,
            $limit,
            'Expected a value not less than %d',
            true
        ))->evaluate();
    }

    public function equal(mixed $expected): void
    {
        (new IsEqual(
            $this->value,
            $expected,
            'Expected a value not equal to %s.',
            true
        ))->evaluate();
    }

    public function list(): void
    {
        (new IsList(
            $this->value,
            Type::BOOL->value,
            'Expected array not to be a list',
            true
        ))->evaluate();
    }
}
