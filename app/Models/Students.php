<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departments;


class Students extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'surname', 'student_number','country','email','department_id'];
    public function department()
{
    return $this->belongsTo(Departments::class);
}

    
}

