<?php
class Petshop{
// membuat class petshop

    // deklarasi atribut private
    private $idProduk;
    private $namaProduk;
    private $hargaProduk;

    // deklarasi method public
    public function __construct($idProduk, $namaProduk, $hargaProduk){
        // konstruktor 
        $this->idProduk = $idProduk;
        $this->namaProduk = $namaProduk;
        $this->hargaProduk = $hargaProduk;
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

    // setter untuk harga Produk
    public function setHargaProduk($hargaProduk){
        $this->hargaProduk = $hargaProduk;
    }

    // getter untuk harga Produk
    public function getHargaProduk(){
        return $this->hargaProduk;
    }

    // method untuk menampilkan detail produk
    public function tampilkanProduk(){
        echo "ID Produk: ".$this->idProduk."<br>";
        echo "Nama Produk: ".$this->namaProduk."<br>";
        echo "Harga Produk: ".$this->hargaProduk."<br>";
        echo "<hr>";
    }

    // method untuk mengupdate produk
    public function updateProduk($idProdukBaru, $namaProdukBaru, $hargaProdukBaru){
        $this->idProduk = $idProdukBaru;
        $this->namaProduk = $namaProdukBaru;
        $this->hargaProduk = $hargaProdukBaru;
    }

    // method untuk menghapus produk
    public function hapusProduk(&$daftarProduk, $namaProduk) {
        $daftarProduk = array_filter($daftarProduk, function ($produk) use ($namaProduk) {
            return $produk->idProduk !== $namaProduk;
        });
        
        // Reset indeks array agar tetap rapi
        $daftarProduk = array_values($daftarProduk);
    }

    // method untuk mencari produk berdasarkan nama
    public function cariProduk($namaProduk){
        if($this->namaProduk == $namaProduk){
            return true;
        }
        return false;
    }

    function __destruct(){
        // destruktor
    }

}
?>