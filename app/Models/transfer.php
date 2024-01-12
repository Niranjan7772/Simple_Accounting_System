<?php

namespace App\Models;

use App\Models\account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'from_acc_id',
        'to_acc_id',
        'date',
        'description',
        'amount',
        'created_by'
    ];

    public function fromAccount()
    {
        return $this->belongsTo(account::class, 'from_acc_id');
    }

    public function toAccount()
    {
        return $this->belongsTo(account::class, 'to_acc_id');
    }
}
