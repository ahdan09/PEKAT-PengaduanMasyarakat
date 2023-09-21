<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = ['tgl_pengaduan', 'nik','judul', 'isi_laporan', 'foto', 'status'];

    public const STATUS_BELUM_DIPROSES = 'belum diproses';
    public const STATUS_SEDANG_PROSES = 'sedang proses';
    public const STATUS_SELESAI = 'selesai';

    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }
    public function details() {
        return $this->hasMany(Pengaduan::class, 'id_pengaduan', 'id');
    }
    public function keterangans()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id_keterangan');
    }

    public function tanggapans()
    {
        return $this->hasOne(Keterangan::class);
    }

    public function status()
    {
        return $this->belongsTo(Keterangan::class, 'status_id', 'status');
    }
}
