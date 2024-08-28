<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spp extends Model
{
    use HasFactory;

    protected $guarded = ['id_spp'];

    protected $primaryKey = "id_spp";

    // protected $with = ['siswa', 'pembayaran'];

    /**
     * Get all of the siswa for the Spp
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class, 'id_spp', 'id_spp');
    }

    /**
     * Get all of the pembayaran for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_spp', 'id_spp');
    }

}
