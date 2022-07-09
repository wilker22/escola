<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function feeCategoryAmount()
    {
        return $this->hasMany(FeeCategoryAmount::class);
    }

    public function assign_subject()
    {
        return $this->hasMany(AssignSubject::class);
    }
}
