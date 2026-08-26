<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccordionShowcase extends Model
{
    use HasFactory;

    protected $table = 'accordion_showcases';

    protected $fillable = [
        'title',
        'image_url',
        'link',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
