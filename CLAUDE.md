# Assertion — Claude Code Project Rules

Fluent PHP assertion library (`lucaslaurens/assertion`). PHP 8.3+. Throws `InvalidAssertionException` on failure. Quality gate: `pint` + `phpstan` + `phpunit` (see `Makefile`).

## Algorithmic Complexity

Reason about time & space for any code written, modified, or reviewed.

1. **Annotate** — for any non-trivial function (loops, recursion, collection work), comment the Big O: `// O(n log n) time, O(n) space`. State what `n` is when not obvious.
2. **Justify** briefly when the complexity isn't obvious.
3. **Flag** any O(n²)-or-worse on potentially large data **before** writing it; propose a better approach.

### Anti-patterns to hunt

- `in_array()` / `array_search()` inside a loop → `array_flip` + `isset()` (O(1) instead of O(n)).
- Nested loops over the same array → single pass with an auxiliary index map.
- String concatenation in a loop → accumulate then `implode()`.
- Repeated `array_unshift()` → build in reverse, or use `SplDoublyLinkedList`.
- Re-sorting a mutated array → sort once, or keep an ordered structure (`SplHeap`, `SplPriorityQueue`).
- Recomputed subproblems → memoize.

### Structure by dominant op

| Need | Use |
|------|-----|
| Key lookup / membership O(1) | associative array (`array_flip` + `isset()`) |
| Queue / stack | `SplQueue` / `SplStack`, not `array_shift` in a loop |
| Recurring min/max | `SplHeap` / `SplPriorityQueue` |

### Trade-offs & simplicity

- State memory trade-offs (cache, memoization): "O(n²)→O(n) time, O(n) extra space".
- On small/bounded `n` (< ~100) or one-shot code, prefer readability — but say so explicitly. Assertion checks run on caller inputs, so keep per-assertion cost predictable (avoid hidden O(n) scans in a single assertion unless documented).
