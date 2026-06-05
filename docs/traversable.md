# Array / Traversable Assertions

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
