# Assertion

Fluent PHP assertions for validating method inputs and outputs. Throws `InvalidAssertionException` on failure.

**Requires PHP 8.3+**

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

Every assertion has a negated form via `assertionNot()`:

```php
assertionNot($value)->null();           // passes if not null
assertionNot($value)->greaterThan(10);  // passes if not > 10
assertionNot($value)->sorted();         // passes if not sorted ascending
```

## Reference

- [Type](docs/type.md)
- [Boolean](docs/boolean.md) — `true`/`false` vs `truthy`/`falsy`
- [Equality](docs/equality.md)
- [Cardinality](docs/cardinality.md)
- [Numeric](docs/numeric.md)
- [String](docs/string.md)
- [Array / Traversable](docs/traversable.md)
