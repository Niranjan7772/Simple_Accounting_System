<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Audit_trail extends Model
{
    use HasFactory;

    protected $table = 'audit_trails';
    
    protected $fillable=[
           'user_id',
           'action',
           'details'
    ];

}
