<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'nomor_identitas',
        'tipe_kamar',
        'harga',
        'tanggal_pesan',
        'durasi',
        'breakfast',
        'total_bayar',
    ];
}
