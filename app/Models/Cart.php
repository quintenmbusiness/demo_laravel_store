<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $fillable = ['user_id'];

    /**
     * @return HasMany<CartItem, Cart>
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * @return BelongsTo<Cart, User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
