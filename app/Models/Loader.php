<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loader extends Model
{
    use HasFactory;

    protected $fillable = [
        'RegNumber',
        'Marka',
        'IsActive',
        'UserId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId', 'id');
    }

    public function loaderBreakings()
    {
        return $this->hasMany(LoaderBreaking::class, 'LoaderId', 'id');
    }
}
