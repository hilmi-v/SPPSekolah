<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guarded = ['id_petugas'];

    protected $primaryKey = 'id_petugas';

    // protected $with = ['pembayaran'];

    /**
     * Get all of the pembayaran for the Petugas
     */
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_petugas', 'id_petugas');
    }
}
