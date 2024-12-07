<?php

namespace App\Popo\User;

class UserPopo
{
    public function __construct(
        public string|null $name,
        public string|null $email,
        public string|null $password,
    ) {
    }
}
