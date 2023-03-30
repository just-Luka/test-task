<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Stuff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'email',
        'age',
        'phone_number',
        'branch_id',
        'occupation_id',
    ];
    
    /**
     * occupation
     *
     * @return BelongsTo
     */
    public function occupation(): BelongsTo
    {
        return $this->BelongsTo(Occupation::class);
    }
    
    /**
     * branch
     *
     * @return BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }
        
    /**
     * getByBranchId
     *
     * @param  mixed $id
     * @return Collection
     */
    public static function getByBranchId($id): Collection
    {
        return Stuff::where('branch_id', $id)->with('occupation')->orderBy('name')->get();
    }
}
