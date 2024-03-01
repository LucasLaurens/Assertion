<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Enums;

/** @todo add label attribute */
enum Type: string
{
    case INT = 'int';
    case BOOL = 'bool';
    case ARRAY = 'array';
    case STRING = 'string';
}
