<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function occupation(): BelongsTo
    {
        return $this->BelongsTo(Occupation::class);
    }

    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public static function getByBranchId($id)
    {
        return Stuff::where('branch_id', $id)->with('occupation')->orderBy('name')->get();;
    }
}
