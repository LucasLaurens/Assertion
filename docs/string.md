# String Assertions

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
