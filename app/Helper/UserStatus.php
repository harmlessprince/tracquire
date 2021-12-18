<?php

namespace App\Helper;

class UserStatus extends Enum
{
    const DELETED = -1;
    const ACTIVE = 1;
    const INACTIVE = 0;
    const IN_REVIEW = 2;
    const BANNED = 419;
}
