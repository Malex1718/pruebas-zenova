<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id_product
 * @property string|null $name
 * @property string|null $price
 * @property int $category
 * @property int $score
 * @property int $on_sale
 * @property int|null $discount
 * @property int $stock
 * @property string $description
 * @property string $main_image
 * @property string $mini_description
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMainImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMiniDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereOnSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStock($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $hidden = ['category', 'stock', 'description'];
    protected $primaryKey = 'id_product';
    public function categoryData(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'category', 'id_category');
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'id_product', 'id_product');
    }
}
