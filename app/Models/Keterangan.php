<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $table = 'keterangan';
    protected $primaryKey = 'id_keterangan';
    protected $fillable = ['id_pengaduan','keterangan','id_petugas','id_user',];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id_keterangan');
    }    
    public function proses()
    {
    return $this->hasMany(Pengaduan::class, 'status_id','status');
    }

    public function country() {
        return $this->hasOne(Pengaduan::class);
    }

}
