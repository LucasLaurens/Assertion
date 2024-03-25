<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion;

use Override;
use LucasLaurens\Assertion\Enums\Type;
use LucasLaurens\Assertion\Contracts\Assertable;
use LucasLaurens\Assertion\Constraints\Boolean\IsBool;
use LucasLaurens\Assertion\Constraints\Boolean\IsTrue;
use LucasLaurens\Assertion\Constraints\String\IsString;
use LucasLaurens\Assertion\Constraints\Equality\IsEqual;
use LucasLaurens\Assertion\Constraints\Traversable\IsArray;
use LucasLaurens\Assertion\Constraints\Type\{IsInstanceOf, IsInt, IsNull};
use LucasLaurens\Assertion\Constraints\Cardinality\{Count, GreaterThan, LessThan};
use LucasLaurens\Assertion\Constraints\Math\IsNan;
use LucasLaurens\Assertion\Constraints\String\Contains;
use LucasLaurens\Assertion\Constraints\String\EndsWith;
use LucasLaurens\Assertion\Constraints\String\IsJson;
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

    #[Override]
    public function null(): void
    {
        (new IsNull(
            $this->value,
            null,
            'Expected null value. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function instanceOf(string $fqcn): void
    {
        (new IsInstanceOf(
            $this->value,
            $fqcn,
            'Expected %s class. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function string(): void
    {
        (new IsString(
            $this->value,
            Type::STRING->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function integer(): void
    {
        (new IsInt(
            $this->value,
            Type::INT->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function boolean(): void
    {
        (new IsBool(
            $this->value,
            Type::BOOL->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function mustBeArray(): void
    {
        (new IsArray(
            $this->value,
            Type::ARRAY->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function count(int $expected): void
    {
        (new Count(
            $this->value,
            $expected,
            'Expected an array to contain %d elements. Got: %d'
        ))->evaluate();
    }

    #[Override]
    public function greaterThan(int $limit): void
    {
        (new GreaterThan(
            $this->value,
            $limit,
            'Expected a value greater than %d. Got: %d'
        ))->evaluate();
    }

    #[Override]
    public function lessThan(int $limit): void
    {
        (new LessThan(
            $this->value,
            $limit,
            'Expected a value less than %d. Got: %d',
        ))->evaluate();
    }

    #[Override]
    public function equal(mixed $expected): void
    {
        (new IsEqual(
            $this->value,
            $expected,
            'Expected a value equal to %s. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function list(): void
    {
        (new IsList(
            $this->value,
            Type::BOOL->value,
            'Expected array to be a list'
        ))->evaluate();
    }

    #[Override]
    public function stringStartsWith(string $expected): void
    {
        (new StartsWith(
            $this->value,
            $expected,
            'Expected a value to starts with %s. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function stringEndsWith(string $expected): void
    {
        (new EndsWith(
            $this->value,
            $expected,
            'Expected a value to ends with %s. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function stringContains(string $expected): void
    {
        (new Contains(
            $this->value,
            $expected,
            'Expected a value to contains %s'
        ))->evaluate();
    }

    #[Override]
    public function validJson(): void
    {
        (new IsJson(
            $this->value,
            Type::STRING->value,
            'Expected the value to be of type json'
        ))->evaluate();
    }

    #[Override]
    public function nan(): void
    {
        (new IsNan(
            $this->value,
            Type::INT->value,
            'Expected value must not be a number'
        ))->evaluate();
    }

    #[Override]
    public function true(): void
    {
        (new IsTrue(
            $this->value,
            true,
            'Expected a value to be true. Got: %s'
        ))->evaluate();
    }
}
