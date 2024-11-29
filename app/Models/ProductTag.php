<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $table = 'product_tag';

    /**
     * @inheritdoc
     */
    protected $fillable = ['product_id', 'tag_id'];
}
