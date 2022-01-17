<?php

namespace App\Enums;

class UserActionEnum extends Enum
{
    const SIGNUP = ['name' => 'signup', 'reward' => 100];
    const REVIEW = ['name' => 'review', 'reward' => 200];
    const REFERRAL = ['name' => 'referral', 'reward' => 300];
}
