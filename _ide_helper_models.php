<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id_kelas
 * @property string $nama_kelas
 * @property string $kompetensi_keahlian
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Siswa> $siswa
 * @property-read int|null $siswa_count
 * @method static \Database\Factories\KelasFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereIdKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereKompetensiKeahlian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereNamaKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereUpdatedAt($value)
 */
	class Kelas extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id_pembayaran
 * @property int $id_petugas
 * @property int $nisn
 * @property int $id_spp
 * @property string $tgl_bayar
 * @property string $bulan_dibayar
 * @property string $tahun_dibayar
 * @property int $jumlah_bayar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Petugas $petugas
 * @property-read \App\Models\Siswa $siswa
 * @property-read \App\Models\Spp $spp
 * @method static \Database\Factories\PembayaranFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereBulanDibayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereIdPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereIdPetugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereIdSpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereJumlahBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTahunDibayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTglBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereUpdatedAt($value)
 */
	class Pembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id_petugas
 * @property string $username
 * @property string $password
 * @property string $nama_petugas
 * @property string $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pembayaran> $pembayaran
 * @property-read int|null $pembayaran_count
 * @method static \Database\Factories\PetugasFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereIdPetugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereNamaPetugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereUsername($value)
 */
	class Petugas extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $nisn
 * @property string $nis
 * @property string $nama
 * @property int $id_kelas
 * @property int $id_spp
 * @property string $alamat
 * @property string $no_telp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kelas $kelas
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pembayaran> $pembayaran
 * @property-read int|null $pembayaran_count
 * @property-read \App\Models\Spp $spp
 * @method static \Database\Factories\SiswaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereIdKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereIdSpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNoTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereUpdatedAt($value)
 */
	class Siswa extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id_spp
 * @property int $tahun
 * @property int $nominal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pembayaran> $pembayaran
 * @property-read int|null $pembayaran_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Siswa> $siswa
 * @property-read int|null $siswa_count
 * @method static \Database\Factories\SppFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Spp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spp query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereIdSpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereUpdatedAt($value)
 */
	class Spp extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $level
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

