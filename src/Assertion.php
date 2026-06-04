<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion;

use Override;
use LucasLaurens\Assertion\Enums\Type;
use LucasLaurens\Assertion\Contracts\Assertable;
use LucasLaurens\Assertion\Constraints\IsCallable;
use LucasLaurens\Assertion\Constraints\Math\IsNan;
use LucasLaurens\Assertion\Constraints\String\IsJson;
use LucasLaurens\Assertion\Constraints\String\IsEmail;
use LucasLaurens\Assertion\Constraints\String\IsUrl;
use LucasLaurens\Assertion\Constraints\String\IsUuid;
use LucasLaurens\Assertion\Constraints\String\IsAlpha;
use LucasLaurens\Assertion\Constraints\String\IsAlphanumeric;
use LucasLaurens\Assertion\Constraints\String\IsBase64;
use LucasLaurens\Assertion\Constraints\String\IsBlank;
use LucasLaurens\Assertion\Constraints\String\IsNotBlank;
use LucasLaurens\Assertion\Constraints\String\IsIp;
use LucasLaurens\Assertion\Constraints\String\IsHexColor;
use LucasLaurens\Assertion\Constraints\String\IsSlug;
use LucasLaurens\Assertion\Constraints\String\IsUppercase;
use LucasLaurens\Assertion\Constraints\String\IsLowercase;
use LucasLaurens\Assertion\Constraints\String\IsNotEmpty;
use LucasLaurens\Assertion\Constraints\String\HasLength;
use LucasLaurens\Assertion\Constraints\String\HasMinLength;
use LucasLaurens\Assertion\Constraints\String\HasMaxLength;
use LucasLaurens\Assertion\Constraints\String\Matches;
use LucasLaurens\Assertion\Constraints\Boolean\IsBool;
use LucasLaurens\Assertion\Constraints\Boolean\IsTrue;
use LucasLaurens\Assertion\Constraints\Boolean\IsFalse;
use LucasLaurens\Assertion\Constraints\Boolean\IsTruthy;
use LucasLaurens\Assertion\Constraints\Boolean\IsFalsy;
use LucasLaurens\Assertion\Constraints\String\Contains;
use LucasLaurens\Assertion\Constraints\String\EndsWith;
use LucasLaurens\Assertion\Constraints\String\IsString;
use LucasLaurens\Assertion\Constraints\Equality\IsEqual;
use LucasLaurens\Assertion\Constraints\String\StartsWith;
use LucasLaurens\Assertion\Constraints\Traversable\IsList;
use LucasLaurens\Assertion\Constraints\Traversable\IsArray;
use LucasLaurens\Assertion\Constraints\Traversable\ArrayHasKey;
use LucasLaurens\Assertion\Constraints\Traversable\DoesNotContainKey;
use LucasLaurens\Assertion\Constraints\Traversable\ContainsValue;
use LucasLaurens\Assertion\Constraints\Traversable\DoesNotContainValue;
use LucasLaurens\Assertion\Constraints\Traversable\InArray;
use LucasLaurens\Assertion\Constraints\Traversable\HasMinCount;
use LucasLaurens\Assertion\Constraints\Traversable\HasMaxCount;
use LucasLaurens\Assertion\Constraints\Traversable\IsSorted;
use LucasLaurens\Assertion\Constraints\Traversable\IsSortedDescending;
use LucasLaurens\Assertion\Constraints\Traversable\IsUnique;
use LucasLaurens\Assertion\Constraints\Type\{IsInstanceOf, IsInt, IsNull, IsFloat, IsObject, IsScalar, IsIterable, IsCountable, IsNumeric};
use LucasLaurens\Assertion\Constraints\Cardinality\{Count, GreaterThan, IsEmpty, LessThan};
use LucasLaurens\Assertion\Constraints\Numeric\{IsPositive, IsNegative, IsZero, IsGreaterThanOrEqualTo, IsLessThanOrEqualTo, IsBetween, IsOdd, IsEven, IsDivisibleBy};

/**
 * @template TValue
 */
final readonly class Assertion implements Assertable
{
    /**
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
            'Expected %s value. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function notNull(): void
    {
        (new IsNull(
            $this->value,
            null,
            'Expected a non-null value',
            true
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
    public function float(): void
    {
        (new IsFloat(
            $this->value,
            Type::FLOAT->value,
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
    public function object(): void
    {
        (new IsObject(
            $this->value,
            Type::OBJECT->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function scalar(): void
    {
        (new IsScalar(
            $this->value,
            Type::SCALAR->value,
            'Expected %s value type. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function numeric(): void
    {
        (new IsNumeric(
            $this->value,
            Type::NUMERIC->value,
            'Expected %s value. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function iterable(): void
    {
        (new IsIterable(
            $this->value,
            Type::ITERABLE->value,
            'Expected %s value. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function countable(): void
    {
        (new IsCountable(
            $this->value,
            Type::COUNTABLE->value,
            'Expected %s value. Got: %s'
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
    public function positive(): void
    {
        (new IsPositive(
            actual: $this->value,
            pattern: 'Expected a positive number (> 0). Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function negative(): void
    {
        (new IsNegative(
            actual: $this->value,
            pattern: 'Expected a negative number (< 0). Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function zero(): void
    {
        (new IsZero(
            actual: $this->value,
            pattern: 'Expected zero. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function greaterThanOrEqualTo(int|float $limit): void
    {
        (new IsGreaterThanOrEqualTo(
            $this->value,
            $limit,
            'Expected a value greater than or equal to %s. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function lessThanOrEqualTo(int|float $limit): void
    {
        (new IsLessThanOrEqualTo(
            $this->value,
            $limit,
            'Expected a value less than or equal to %s. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function between(int|float $min, int|float $max): void
    {
        (new IsBetween(
            $this->value,
            $min,
            $max,
            'Expected value between %s and %s. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function odd(): void
    {
        (new IsOdd(
            actual: $this->value,
            pattern: 'Expected an odd integer. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function even(): void
    {
        (new IsEven(
            actual: $this->value,
            pattern: 'Expected an even integer. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function divisibleBy(int|float $divisor): void
    {
        (new IsDivisibleBy(
            $this->value,
            $divisor,
            'Expected value to be divisible by %s. Got: %s'
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
    public function stringNotEmpty(): void
    {
        (new IsNotEmpty(
            actual: $this->value,
            pattern: 'Expected a non-empty string'
        ))->evaluate();
    }

    #[Override]
    public function stringLength(int $expected): void
    {
        (new HasLength(
            $this->value,
            $expected,
            'Expected string of length %d. Got: %d'
        ))->evaluate();
    }

    #[Override]
    public function stringMinLength(int $min): void
    {
        (new HasMinLength(
            $this->value,
            $min,
            'Expected string with minimum length %d. Got: %d'
        ))->evaluate();
    }

    #[Override]
    public function stringMaxLength(int $max): void
    {
        (new HasMaxLength(
            $this->value,
            $max,
            'Expected string with maximum length %d. Got: %d'
        ))->evaluate();
    }

    #[Override]
    public function stringMatches(string $pattern): void
    {
        (new Matches(
            $this->value,
            $pattern,
            'Expected string to match pattern "%s". Got: %s'
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
    public function validEmail(): void
    {
        (new IsEmail(
            actual: $this->value,
            pattern: 'Expected a valid email address. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function validUrl(): void
    {
        (new IsUrl(
            actual: $this->value,
            pattern: 'Expected a valid URL. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function validUuid(): void
    {
        (new IsUuid(
            actual: $this->value,
            pattern: 'Expected a valid UUID. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function uppercase(): void
    {
        (new IsUppercase(
            actual: $this->value,
            pattern: 'Expected an uppercase string. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function lowercase(): void
    {
        (new IsLowercase(
            actual: $this->value,
            pattern: 'Expected a lowercase string. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function alpha(): void
    {
        (new IsAlpha(
            actual: $this->value,
            pattern: 'Expected a string containing only letters. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function alphanumeric(): void
    {
        (new IsAlphanumeric(
            actual: $this->value,
            pattern: 'Expected a string containing only letters and digits. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function base64(): void
    {
        (new IsBase64(
            actual: $this->value,
            pattern: 'Expected a valid base64 string. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function blank(): void
    {
        (new IsBlank(
            actual: $this->value,
            pattern: 'Expected a blank string (whitespace only). Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function notBlank(): void
    {
        (new IsNotBlank(
            actual: $this->value,
            pattern: 'Expected a non-blank string. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function validIp(): void
    {
        (new IsIp(
            actual: $this->value,
            pattern: 'Expected a valid IP address. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function hexColor(): void
    {
        (new IsHexColor(
            actual: $this->value,
            pattern: 'Expected a valid hex color (e.g. #fff or #ffffff). Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function slug(): void
    {
        (new IsSlug(
            actual: $this->value,
            pattern: 'Expected a valid slug (lowercase letters, digits, and hyphens). Got: %s'
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
            'Expected a value to be %s. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function false(): void
    {
        (new IsFalse(
            $this->value,
            false,
            'Expected a value to be %s. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function truthy(): void
    {
        (new IsTruthy(
            actual: $this->value,
            pattern: 'Expected a truthy value. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function falsy(): void
    {
        (new IsFalsy(
            actual: $this->value,
            pattern: 'Expected a falsy value. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function empty(): void
    {
        (new IsEmpty(
            actual: $this->value,
            pattern: 'Expected an empty value. Got %s'
        ))->evaluate();
    }

    #[Override]
    public function callable(): void
    {
        (new IsCallable(
            actual: $this->value,
            pattern: 'Expected a callable. Got: %s'
        ))->evaluate();
    }

    #[Override]
    public function arrayHasKey(string $key): void
    {
        (new ArrayHasKey(
            $this->value,
            $key,
            'Expected the key %s to exist'
        ))->evaluate();
    }

    #[Override]
    public function doesNotContainKey(string|int $key): void
    {
        (new DoesNotContainKey(
            $this->value,
            $key,
            'Expected the key %s to not exist'
        ))->evaluate();
    }

    #[Override]
    public function containsValue(mixed $value): void
    {
        (new ContainsValue(
            $this->value,
            $value,
            'Expected array to contain value %s'
        ))->evaluate();
    }

    #[Override]
    public function doesNotContainValue(mixed $value): void
    {
        (new DoesNotContainValue(
            $this->value,
            $value,
            'Expected array to not contain value %s'
        ))->evaluate();
    }

    #[Override]
    public function inArray(array $haystack): void
    {
        (new InArray(
            $this->value,
            $haystack,
            'Expected %s to be in the provided array'
        ))->evaluate();
    }

    #[Override]
    public function arrayMinCount(int $min): void
    {
        (new HasMinCount(
            $this->value,
            $min,
            'Expected at least %d elements. Got: %d'
        ))->evaluate();
    }

    #[Override]
    public function arrayMaxCount(int $max): void
    {
        (new HasMaxCount(
            $this->value,
            $max,
            'Expected at most %d elements. Got: %d'
        ))->evaluate();
    }

    #[Override]
    public function sorted(): void
    {
        (new IsSorted(
            actual: $this->value,
            pattern: 'Expected array to be sorted in ascending order'
        ))->evaluate();
    }

    #[Override]
    public function sortedDescending(): void
    {
        (new IsSortedDescending(
            actual: $this->value,
            pattern: 'Expected array to be sorted in descending order'
        ))->evaluate();
    }

    #[Override]
    public function unique(): void
    {
        (new IsUnique(
            actual: $this->value,
            pattern: 'Expected array to contain only unique values'
        ))->evaluate();
    }
}
