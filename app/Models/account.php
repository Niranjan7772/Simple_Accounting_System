<?php

namespace App\Models;

use App\Models\Expense;
use App\Models\transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class account extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'created_by'
    ];
    public function users()
    {
        $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(transaction::class, 'acc_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'account_id');
    }
}
