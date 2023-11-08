<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class SyncXMLFile extends Command
{
    protected $signature = 'xml:sync';
    protected $description = 'XML dosyasi indirmek icin kullanilir.';

    public function handle()
    {
        ini_set('memory_limit','1024M');

        try {
            $xmlString = file_get_contents(storage_path() . "/app/file.xml");
            $xmlObject = simplexml_load_string($xmlString);

            $json = json_encode($xmlObject);
            $array = json_decode($json, true);

            foreach($array['product'] as $xmlRow) {
                $product = Product::where('product_id',$xmlRow['id'])->first();

                if($product) { //urun var ve guncelle
                    if($product->price != $xmlRow['price']) {
                        $product->price = $xmlRow['price'];
                    }

                    if($product->quantity != $xmlRow['quantity']) {
                        $product->quantity = $xmlRow['quantity'];
                    }
                } else { //urun yok ekle
                    $product = new Product();
                    $product->product_id = $xmlRow['id'];
                    $product->price = $xmlRow['price'];
                    $product->quantity = $xmlRow['quantity'];
                }

                $product->save();
            }

            $products = Product::select('product_id')->get();
            $productIds = array_column($array['product'], 'id');

            foreach($products as $row) {
                if (!in_array($row->product_id, $productIds)) { //urun xmlden kaldirilmis, dbden sil
                    Product::where('product_id', $row->product_id)->delete();
                }
            }

            echo "Senkronizasyon tamamlandi.";

        } catch (\Throwable $th) {
            echo $th->getMessage();

            Log::error($th->getMessage());
        }
    }
}
