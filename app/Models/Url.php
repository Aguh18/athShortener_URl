<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

      // Tentukan nama tabel jika tidak mengikuti konvensi plural otomatis
      protected $table = 'urls';

      // Tentukan kolom yang boleh diisi (mass assignable)
      protected $fillable = [
          'short_code',
          'original_url',
          'expiration_date',
          'click_count'
      ];

      // Tentukan tipe data untuk kolom tertentu
      protected $casts = [
          'created_at' => 'datetime',
          'expiration_date' => 'datetime',
      ];
      public $timestamps = false;

      /**
       * Increment click count by 1.
       *
       * This method increments the click count for the URL.
       */
      public function incrementClickCount()
      {
          $this->increment('click_count');
      }

      /**
       * Scope untuk memfilter URL yang masih aktif (belum kedaluwarsa).
       */
      public function scopeActive($query)
      {
          return $query->where(function($query) {
              $query->whereNull('expiration_date')
                    ->orWhere('expiration_date', '>', now());
          });
      }

}
