<?php

namespace App\Enums;

enum Status: int
{
    case PENDING = 0;
    case ACTIVE  = 1;
    case DENIED  = 2;
}
