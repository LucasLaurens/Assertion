# Cardinality Assertions

| Assertion | Passes when |
|-----------|-------------|
| `->count(int $n)` | `count($value) === $n` |
| `->greaterThan(int $limit)` | numeric and `$value > $limit` |
| `->lessThan(int $limit)` | numeric and `$value < $limit` |
| `->empty()` | `empty($value)` or `Countable` with count 0 |

> `greaterThan` and `lessThan` reject non-numeric values. Pass an `int` or `float` — strings throw.
