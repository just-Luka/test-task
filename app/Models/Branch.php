<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    
    /**
     * stuff
     *
     * @return HasOne
     */
    public function stuff(): HasOne
    {
        return $this->HasOne(Stuff::class);
    }
}
