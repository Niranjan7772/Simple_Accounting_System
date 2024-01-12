<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    protected $fillable = ['customer_id', 'date', 'due_date', 'amount','status','created_by'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function invoiceitems()
    {
        return $this->hasMany(invoiceitems::class);
    }
}
