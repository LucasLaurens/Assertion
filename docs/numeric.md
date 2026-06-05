# Numeric Assertions

All numeric assertions reject non-`int`/`float` values.

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
