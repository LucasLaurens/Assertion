# Assertion

Fluent PHP assertions for validating method inputs and outputs. Throws `InvalidAssertionException` on failure.

**Requires PHP 8.4+**

## Installation

```bash
composer require lucaslaurens/assertion
```

## Usage

```php
use function LucasLaurens\Assertion\assertion;
use function LucasLaurens\Assertion\assertionNot;

assertion($value)->string();           // passes or throws
assertionNot($value)->null();          // negated form
```

---

## Reference

### Type

| Assertion | Passes when |
|-----------|-------------|
| `->string()` | `is_string($value)` |
| `->integer()` | `is_int($value)` |
| `->float()` | `is_float($value)` |
| `->boolean()` | `is_bool($value)` |
| `->mustBeArray()` | `is_array($value)` |
| `->object()` | `is_object($value)` |
| `->scalar()` | `is_scalar($value)` |
| `->numeric()` | `is_numeric($value)` |
| `->iterable()` | `is_iterable($value)` |
| `->countable()` | `is_countable($value)` |
| `->null()` | `$value === null` |
| `->notNull()` | `$value !== null` |
| `->instanceOf(Foo::class)` | `$value instanceof Foo` |
| `->nan()` | `is_float($value) && is_nan($value)` |
| `->callable()` | `is_callable($value)` |

---

### Boolean

#### `true()` / `false()` — strict boolean check

Passes only when the value is the exact boolean `true` or `false`. Any other type (0, "", null, []) fails.

```php
assertion(true)->true();     // ✓
assertion(1)->true();        // ✗ — 1 is not the boolean true
assertion(false)->false();   // ✓
assertion(0)->false();       // ✗ — 0 is not the boolean false
assertion(null)->false();    // ✗ — null is not the boolean false
```

Use when the contract requires an exact boolean — e.g., a function that must return `false`, not `null` or `0`.

#### `truthy()` / `falsy()` — PHP cast check

Passes for any value PHP evaluates as truthy/falsy when cast to `bool`.

| Falsy values | Truthy values |
|-------------|--------------|
| `false` | `true` |
| `0`, `0.0` | any non-zero number |
| `""`, `"0"` | any non-empty string |
| `[]` | any non-empty array |
| `null` | any object |

```php
assertion(1)->truthy();        // ✓
assertion("hello")->truthy();  // ✓
assertion([])->falsy();        // ✓
assertion(0)->falsy();         // ✓
assertion("0")->falsy();       // ✓
assertion(null)->falsy();      // ✓
```

Use when you only care whether a value is "present/valid" versus "absent/empty" — form inputs, legacy functions returning 0/-1 on failure, optional values.

| | `true()` / `false()` | `truthy()` / `falsy()` |
|---|---|---|
| Type-checked | ✓ must be `bool` | ✗ any type |
| `0` passes `falsy()` | ✗ | ✓ |
| `null` passes `falsy()` | ✗ | ✓ |
| `""` passes `falsy()` | ✗ | ✓ |

---

### Equality

| Assertion | Passes when |
|-----------|-------------|
| `->equal($expected)` | `$value === $expected` (strict) |

---

### Cardinality

| Assertion | Passes when |
|-----------|-------------|
| `->count(int $n)` | `count($value) === $n` |
| `->greaterThan(int $limit)` | numeric and `$value > $limit` |
| `->lessThan(int $limit)` | numeric and `$value < $limit` |
| `->empty()` | `empty($value)` or `Countable` with count 0 |

> `greaterThan` and `lessThan` reject non-numeric values. Pass an `int` or `float` — strings throw.

---

### Numeric

| Assertion | Passes when |
|-----------|-------------|
| `->positive()` | `int\|float` and `> 0` |
| `->negative()` | `int\|float` and `< 0` |
| `->zero()` | `int\|float` and `=== 0` or `=== 0.0` |
| `->greaterThanOrEqualTo(int\|float $limit)` | numeric and `>= $limit` |
| `->lessThanOrEqualTo(int\|float $limit)` | numeric and `<= $limit` |
| `->between(int\|float $min, int\|float $max)` | numeric and `>= $min && <= $max` |
| `->odd()` | `int` and `% 2 !== 0` |
| `->even()` | `int` and `% 2 === 0` |
| `->divisibleBy(int\|float $divisor)` | numeric and `fmod($value, $divisor) === 0.0` |

All numeric assertions reject non-`int`/`float` values.

---

### String

| Assertion | Passes when |
|-----------|-------------|
| `->stringNotEmpty()` | `is_string` and `!== ""` |
| `->stringContains(string $sub)` | `str_contains` |
| `->stringStartsWith(string $prefix)` | `str_starts_with` |
| `->stringEndsWith(string $suffix)` | `str_ends_with` |
| `->stringLength(int $n)` | `strlen === $n` |
| `->stringMinLength(int $min)` | `strlen >= $min` |
| `->stringMaxLength(int $max)` | `strlen <= $max` |
| `->stringMatches(string $pattern)` | `preg_match` |
| `->uppercase()` | all chars uppercase |
| `->lowercase()` | all chars lowercase |
| `->alpha()` | only letters |
| `->alphanumeric()` | only letters and digits |
| `->blank()` | whitespace only |
| `->notBlank()` | contains non-whitespace |
| `->validEmail()` | `FILTER_VALIDATE_EMAIL` |
| `->validUrl()` | `FILTER_VALIDATE_URL` |
| `->validUuid()` | RFC 4122 UUID pattern |
| `->validIp()` | valid IPv4 or IPv6 |
| `->validJson()` | parseable JSON |
| `->hexColor()` | `#fff` or `#ffffff` |
| `->slug()` | lowercase, digits, hyphens |
| `->base64()` | valid base64 |

---

### Array / Traversable

| Assertion | Passes when |
|-----------|-------------|
| `->list()` | `array_is_list` |
| `->arrayHasKey(string $key)` | `array_key_exists` |
| `->doesNotContainKey(string\|int $key)` | key absent |
| `->containsValue(mixed $value)` | `in_array` strict |
| `->doesNotContainValue(mixed $value)` | not `in_array` strict |
| `->inArray(array $haystack)` | `in_array` strict |
| `->arrayMinCount(int $min)` | `count >= $min` |
| `->arrayMaxCount(int $max)` | `count <= $max` |
| `->sorted()` | ascending order |
| `->sortedDescending()` | descending order |
| `->unique()` | no duplicate values |

---

## Negation

Every assertion has a negated form via `assertionNot()`:

```php
assertionNot($value)->null();           // passes if not null
assertionNot($value)->greaterThan(10);  // passes if not > 10
assertionNot($value)->sorted();         // passes if not sorted ascending
```
