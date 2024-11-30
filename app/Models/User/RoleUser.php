<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $table = 'role_user';

    /**
     * @var string[]
     */
    protected $fillable = ['role_id', 'user_id'];
}
