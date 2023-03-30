<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    
    /**
     * staff
     *
     * @return HasOne
     */
    public function staff(): HasOne
    {
        return $this->HasOne(Staff::class);
    }
}
