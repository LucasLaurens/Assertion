# Type Assertions

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
