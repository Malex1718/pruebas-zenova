<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id_image
 * @property int $id_product
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereIdImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereImage($value)
 * @mixin \Eloquent
 */
class ProductImage extends Model
{
    protected $table = 'product_image';
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
