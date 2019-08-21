<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resource
 * @package App\Model
 */
class Resource extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'creator_id', 'user_id', 'accepted_by', 'amount', 'rss', 'comment',
    ];

    const TYPES = ['food', 'stones', 'timber', 'ore', 'gold'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFood($query)
    {
        return $query->where('rss', '=', 'food');
    }

    public function scopeStones($query)
    {
        return $query->where('rss', '=', 'stones');
    }

    public function scopeTimber($query)
    {
        return $query->where('rss', '=', 'timber');
    }

    public function scopeOre($query)
    {
        return $query->where('rss', '=', 'ore');
    }

    public function scopeGold($query)
    {
        return $query->where('rss', '=', 'gold');
    }

    public function scopeMy($query)
    {
        return $query->where('user_id', '=', auth()->user()->id);
    }
}
