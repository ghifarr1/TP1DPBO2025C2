<?php
class Petshop{
    private string $idProduk;
    private string $namaProduk;
    private string $kategoriProduk;
    private int $hargaProduk;
    private string $gambarProduk;

    public function __construct($idProduk, $namaProduk, $kategoriProduk, $hargaProduk, $gambarProduk){
        $this->idProduk = $idProduk;
        $this->namaProduk = $namaProduk;
        $this->kategoriProduk = $kategoriProduk;
        $this->hargaProduk = $hargaProduk;
        $this->gambarProduk = $gambarProduk;
    }

    // setter untuk id Produk
    public function setIdProduk($idProduk){
        $this->idProduk = $idProduk;
    }

    // getter untuk id Produk
    public function getIdProduk(){
        return $this->idProduk;
    }

    // setter untuk nama Produk
    public function setNamaProduk($namaProduk){
        $this->namaProduk = $namaProduk;
    }

    // getter untuk nama Produk
    public function getNamaProduk(){
        return $this->namaProduk;
    }

    // setter untuk kategori Produk
    public function setKategoriProduk($kategoriProduk){
        $this->kategoriProduk = $kategoriProduk;
    }

    // getter untuk kategori Produk
    public function getKategoriProduk(){
        return $this->kategoriProduk;
    }

    // setter untuk harga Produk
    public function setHargaProduk($hargaProduk){
        $this->hargaProduk = $hargaProduk;
    }

    // getter untuk harga Produk
    public function getHargaProduk(){
        return $this->hargaProduk;
    }

    // setter untuk gambar Produk
    public function setGambarProduk($gambarProduk){
        $this->gambarProduk = $gambarProduk;
    }

    // getter untuk gambar Produk
    public function getGambarProduk(){
        return $this->gambarProduk;
    }

    public function toArray(){
        return [
            'idProduk' => $this->idProduk,
            'namaProduk' => $this->namaProduk,
            'kategoriProduk' => $this->kategoriProduk,
            'hargaProduk' => $this->hargaProduk,
            'gambarProduk' => $this->gambarProduk
        ];
    }
}
?>