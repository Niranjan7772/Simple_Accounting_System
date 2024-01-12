<?php

namespace App\Models;

use App\Models\account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;


    protected $fillable = [
        'date',
        'description',
        'account_id',
           'amount',
             'receipt',
             'created_by'

  ];

  public function account()
    {
        return $this->belongsTo(account::class, 'account_id');
    }
}
