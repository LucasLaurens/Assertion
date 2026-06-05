# Boolean Assertions

## `true()` / `false()` — strict boolean check

Passes only when the value is the exact boolean `true` or `false`. Any other type (0, "", null, []) fails.

```php
assertion(true)->true();     // ✓
assertion(1)->true();        // ✗ — 1 is not the boolean true
assertion(false)->false();   // ✓
assertion(0)->false();       // ✗ — 0 is not the boolean false
assertion(null)->false();    // ✗ — null is not the boolean false
```

Use when the contract requires an exact boolean — e.g., a function that must return `false`, not `null` or `0`.

## `truthy()` / `falsy()` — PHP cast check

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

## Comparison

| | `true()` / `false()` | `truthy()` / `falsy()` |
|---|---|---|
| Type-checked | ✓ must be `bool` | ✗ any type |
| `0` passes `falsy()` | ✗ | ✓ |
| `null` passes `falsy()` | ✗ | ✓ |
| `""` passes `falsy()` | ✗ | ✓ |
