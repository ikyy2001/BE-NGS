<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    use HasFactory;

    protected $table = 'pricing_plans';

    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'billing_period',
        'badge',
        'features',
        'button_text',
        'button_url',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
