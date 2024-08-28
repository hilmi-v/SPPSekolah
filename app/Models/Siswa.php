<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id_siswa'];

    protected $primaryKey = 'nisn';

    public $incrementing = false;

    // protected $with = ['kelas', 'spp', 'pembayaran'];

    /**
     * Get the kelas that owns the Siswa
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    /**
     * Get the spp that owns the Siswa
     */
    public function spp(): BelongsTo
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id_spp');
    }

    /**
     * Get all of the pembayaran for the Siswa
     */
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'nisn', 'nisn');
    }
}
