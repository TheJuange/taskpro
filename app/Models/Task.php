<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $fillable = ['title', 'description', 'due_date', 'priority', 'photo'];
    use HasFactory;
    
}
