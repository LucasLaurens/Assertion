<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion;

use Override;
use LucasLaurens\Assertion\Enums\Type;
use LucasLaurens\Assertion\Contracts\Assertable;
use LucasLaurens\Assertion\Constraints\IsCallable;
use LucasLaurens\Assertion\Constraints\Math\IsNan;
use LucasLaurens\Assertion\Constraints\String\IsJson;
use LucasLaurens\Assertion\Constraints\Boolean\IsBool;
use LucasLaurens\Assertion\Constraints\Boolean\IsTrue;
use LucasLaurens\Assertion\Constraints\Boolean\IsFalse;
use LucasLaurens\Assertion\Constraints\String\Contains;
use LucasLaurens\Assertion\Constraints\String\EndsWith;
use LucasLaurens\Assertion\Constraints\String\IsString;
use LucasLaurens\Assertion\Constraints\Equality\IsEqual;
use LucasLaurens\Assertion\Constraints\String\StartsWith;
use LucasLaurens\Assertion\Constraints\Traversable\IsList;
use LucasLaurens\Assertion\Constraints\Cardinality\IsEmpty;
use LucasLaurens\Assertion\Constraints\Traversable\IsArray;
use LucasLaurens\Assertion\Constraints\Type\{IsInstanceOf, IsInt, IsNull};
use LucasLaurens\Assertion\Constraints\Cardinality\{Count, GreaterThan, LessThan};

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

    #[Override]
    public function null(): void
    {
        (new IsNull(
            $this->value,
            null,
            'Expected a value other than null',
            true
        ))->evaluate();
    }

    #[Override]
    public function instanceOf(string $fqcn): void
    {
        (new IsInstanceOf(
            $this->value,
            $fqcn,
            'Expected an instance other than %s',
            true,
        ))->evaluate();
    }

    #[Override]
    public function string(): void
    {
        (new IsString(
            $this->value,
            Type::STRING->value,
            'Expected an other value type than %s',
            true
        ))->evaluate();
    }

    #[Override]
    public function integer(): void
    {
        (new IsInt(
            $this->value,
            Type::INT->value,
            'Expected an other value type than %s',
            true
        ))->evaluate();
    }

    #[Override]
    public function boolean(): void
    {
        (new IsBool(
            $this->value,
            Type::BOOL->value,
            'Expected an other value type than %s',
            true
        ))->evaluate();
    }

    #[Override]
    public function mustBeArray(): void
    {
        (new IsArray(
            $this->value,
            Type::ARRAY->value,
            'Expected an other value type than %s',
            true
        ))->evaluate();
    }

    #[Override]
    public function count(int $expected): void
    {
        (new Count(
            $this->value,
            $expected,
            'Expected an array not to contain %d elements',
            true
        ))->evaluate();
    }

    #[Override]
    public function greaterThan(int $limit): void
    {
        (new GreaterThan(
            $this->value,
            $limit,
            'Expected a value not greater than %d',
            true
        ))->evaluate();
    }

    #[Override]
    public function lessThan(int $limit): void
    {
        (new LessThan(
            $this->value,
            $limit,
            'Expected a value not less than %d',
            true
        ))->evaluate();
    }

    #[Override]
    public function equal(mixed $expected): void
    {
        (new IsEqual(
            $this->value,
            $expected,
            'Expected a value not equal to %s',
            true
        ))->evaluate();
    }

    #[Override]
    public function list(): void
    {
        (new IsList(
            $this->value,
            Type::BOOL->value,
            'Expected array not to be a list',
            true
        ))->evaluate();
    }

    #[Override]
    public function stringStartsWith(string $expected): void
    {
        (new StartsWith(
            $this->value,
            $expected,
            'Expected a value not to starts with %s',
            true
        ))->evaluate();
    }

    #[Override]
    public function stringEndsWith(string $expected): void
    {
        (new EndsWith(
            $this->value,
            $expected,
            'Expected a value not to ends with %s',
            true
        ))->evaluate();
    }

    #[Override]
    public function stringContains(string $expected): void
    {
        (new Contains(
            $this->value,
            $expected,
            'Expected a value not to contains %s',
            true
        ))->evaluate();
    }

    #[Override]
    public function validJson(): void
    {
        (new IsJson(
            $this->value,
            Type::STRING->value,
            'Expected the value not to be of type json',
            true
        ))->evaluate();
    }

    #[Override]
    public function nan(): void
    {
        (new IsNan(
            $this->value,
            Type::INT->value,
            'Expected value must be a number',
            true
        ))->evaluate();
    }

    #[Override]
    public function true(): void
    {
        (new IsTrue(
            $this->value,
            true,
            'Expected a value not to be true',
            true
        ))->evaluate();
    }

    #[Override]
    public function false(): void
    {
        (new IsFalse(
            $this->value,
            false,
            'Expected a value not to be false',
            true
        ))->evaluate();
    }

    #[Override]
    public function empty(): void
    {
        (new IsEmpty(
            actual: $this->value,
            pattern: 'Expected a non empty value',
            negative: true
        ))->evaluate();
    }

    #[Override]
    public function callable(): void
    {
        (new IsCallable(
            actual: $this->value,
            pattern: 'Expected a non callable value',
            negative: true
        ))->evaluate();
    }
}
