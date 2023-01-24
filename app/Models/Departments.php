<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;



class Departments extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    public function student()
    {
        return $this->hasMany(Students::class, 'department_id','id');
    }
}
