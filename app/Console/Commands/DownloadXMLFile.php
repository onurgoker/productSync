<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DownloadXMLFile extends Command
{
    protected $signature = 'xml:download';
    protected $description = 'XML dosyasi indirmek icin kullanilir.';

    public function handle()
    {
        $response = Http::get(env('XML_PATH'));

        if ($response->ok()) {
            $filename = 'file.xml';
            Storage::put($filename, $response->body());
            $this->info('XML dosyasi basariyla indirildi.');
        } else {
            $this->error('XML dosyasi indirilirken bir hata olustu!');
        }
    }
}
