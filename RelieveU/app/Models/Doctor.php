<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'specialization',
        'experience_years',
        'profile',
    ];
    public function counseling(){
    return $this->hasMany(CounselingHistory::class, 'id', 'doctor_id');
    }
}