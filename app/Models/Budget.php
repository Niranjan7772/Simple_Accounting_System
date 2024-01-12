<?php

namespace App\Models;

use App\Models\account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;
    protected $fillable=[
          'account_id',
          'start_date',
          'end_date',
          'amount',
          'created_by'
    ];

    public function account()
    {
        return $this->belongsTo(account::class, 'account_id');
    }
}
