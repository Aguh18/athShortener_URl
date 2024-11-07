<?php

namespace App\Livewire;

use App\Models\short_link;
use App\Models\Url;
use App\Models\urls;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

use Illuminate\Support\Str;


class UrlShortener extends Component
{
    public $originalUrl;
    public $shortCode ;
    public $errors = [];

    protected $rules = [
        'originalUrl' => 'required|url',  // Validasi URL
    ];

    public function generateShortUrl()
    {
        $data = ['originalUrl' => $this->originalUrl];


       try {

        $validator = Validator::make($data, $this->rules);

        if ($validator->fails()) {

            $this->reset('originalUrl');
            foreach ($validator->errors()->all() as $message) {
                $this->errors[] = $message;
                return;
            }
        }

        do {
            $this->shortCode = Str::random(6);
        } while (Url::where('short_code', $this->shortCode)->exists());


        // Simpan ke database

        Url::create([
            'original_url' => $this->originalUrl,
            'short_code' => $this->shortCode,
            'expiration_date' => now()->addDays(30),  // Tanggal kedaluwarsa 30 hari kedepan
            'click_count' => 0,  // Jumlah klik 0 saat ini
        ]);

        // Reset input setelah berhasil menyimpan
        $this->reset('originalUrl');
        $this->emit('urlShortened');
        session()->flash('sucess', 'URL berhasil dipendekan');

       } catch (\Throwable $th) {
        $this->reset('originalUrl');
        session()->flash('error', $th->getMessage());
       }


    }
    public function render()
    {
        return view('livewire.url-shortener');
    }
}
