<?php

namespace App\Popo\User;

class UserPopo
{
    public function __construct(
        public string $name,
        public string $email,
        public string|null $email_verified_at,
    ) {
    }
}
