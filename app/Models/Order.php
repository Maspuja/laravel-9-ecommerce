<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaction;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_paid',
        'payment_receipt'

    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
