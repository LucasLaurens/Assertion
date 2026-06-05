<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Enums;

enum Type: string
{
    case INT = 'int';
    case FLOAT = 'float';
    case BOOL = 'bool';
    case ARRAY = 'array';
    case STRING = 'string';
    case OBJECT = 'object';
    case NULL = 'null';
    case NUMERIC = 'numeric';
    case SCALAR = 'scalar';
    case ITERABLE = 'iterable';
    case COUNTABLE = 'countable';
}
