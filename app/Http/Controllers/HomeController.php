<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function menu(Request $request)
    {
            // // Hit API Produk
            $client = new Client();

            try {
                // Hit API Kategori
                $responseKategori = $client->request('GET', 'https://api.klajek.com/api/category/1');
                $dataKategori = json_decode($responseKategori->getBody()->getContents(), true);
            } catch (\Exception $e) {
                Log::error('Gagal memuat data kategori: ' . $e->getMessage());
            }
    
            try {
                // Hit API Produk
                $url = 'https://api.klajek.com/api/menus/1';
                $responseProduk = $client->request('GET', $url);
                $dataproduk = json_decode($responseProduk->getBody()->getContents(), true);
    
                $kategori = $request->query('kategori');

                if (!empty($kategori)) {
                    if($kategori == "all"){
                        $dataproduk = $dataproduk;
                    }else{
                        $dataproduk['data'] = array_filter($dataproduk['data'], function ($item) use ($kategori) {
                            return isset($item['kategori']['kategori']) && $item['kategori']['kategori'] === $kategori;
                        });
                    }
                }else{
                    $dataproduk = $dataproduk;
                }
    
            } catch (\Exception $e) {
                Log::error('Gagal memuat data produk: ' . $e->getMessage());
            }
    
            return view('home-page/restoran', [
                'kategori' => $dataKategori, 
                'produk' => $dataproduk,
            ]);
    }

}
