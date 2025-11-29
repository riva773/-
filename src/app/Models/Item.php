<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'brand',
        'price',
        'description',
        'condition',
        'category',
        'status',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo((User::class));
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public const CONDITION_LABELS = [
        'like_new' => '良好',
        'good' => '目立った傷や汚れなし',
        'fair' => 'やや傷や汚れあり',
        'poor' => '状態が悪い',
    ];

    public function getConditionLabelAttribute()
    {
        return self::CONDITION_LABELS[$this->condition];
    }
}
