<?php

namespace App\Models\User;

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
    protected $fillable = [
        'session_id',
        'user_id'
    ];

    protected $with = [
        'items'
    ];

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

    /**
     * Get the total value of the cart.
     *
     * @return float
     */
    public function getTotalAttribute(): float
    {
        return $this->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }
}
