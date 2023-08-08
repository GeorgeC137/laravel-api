<?php

namespace App\Models;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'email',
        'city',
        'state',
        'address',
        'postal_code',
    ];

    // Customer-Invoice relationship
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
