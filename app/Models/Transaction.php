<?php

// app/Models/Transaction.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_produk',
        'id_user',
        'total_harga',
        'tanggal_transaksi',
        'email',
        'no_hp',
        'alamat',
        'metode_pembayaran',
        'kurir'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id');
    }
}
