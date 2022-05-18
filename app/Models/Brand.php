<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands';

    /**
     * Get the productions for the brands.
     */

    public function productions()
    {
        return $this->hasMany(Production::class, 'brand_id', 'id');
    }
}
