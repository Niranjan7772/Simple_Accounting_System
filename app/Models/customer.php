<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'mobile',
        'address',
        'created_by'
    ];
    public function invoice()
    {
        return $this->belongsTo(invoice::class);
    }
}
