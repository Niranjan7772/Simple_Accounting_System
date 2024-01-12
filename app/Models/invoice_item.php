<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_item extends Model
{
    use HasFactory;
    protected $table = 'invoice_items';
    protected $fillable = ['invoice_id', 'name', 'description', 'quantity','unit_price','line_total'];

    public function invoice()
    {
        return $this->belongsTo(invoice::class);
    }
}
