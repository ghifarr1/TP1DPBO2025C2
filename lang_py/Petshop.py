class Petshop:
# membuat kelas petshop

    def __init__(self, idProduk, namaProduk, hargaProduk):
        # konstruktor
        self.idProduk = idProduk
        self.namaProduk = namaProduk
        self.hargaProduk = hargaProduk

    def setIdProduk(self, idProduk):
        # mengeset id produk
        self.idProduk = idProduk

    def getIdProduk(self):
        # mengembalikan id produk
        return self.idProduk
    
    def setNamaProduk(self, namaProduk):
        # mengeset nama produk
        self.namaProduk = namaProduk

    def getNamaProduk(self):
        # mengembalikan nama produk
        return self.namaProduk
    
    def setHargaProduk(self, hargaProduk):
        # mengeset harga produk
        self.hargaProduk = hargaProduk

    def getHargaProduk(self):
        # mengembalikan harga produk
        return self.hargaProduk
    
    # method untuk menampilkan detail produk
    def tampilkanProduk(self):
        print("ID Produk :", self.getIdProduk())
        print("Nama Produk :", self.getNamaProduk())
        print("Harga Produk :", self.getHargaProduk())
        print("\n")

    # method untuk mengupdate produk
    def updateProduk(self, idProdukBaru, namaProdukBaru, hargaProdukBaru):
        self.setIdProduk(idProdukBaru)
        self.setNamaProduk(namaProdukBaru)
        self.setHargaProduk(hargaProdukBaru)
    
    # method untuk menghapus produk
    def hapusProduk(petshop, daftarProduk):
        petshop.setIdProduk(None)
        petshop.setNamaProduk(None)
        petshop.setHargaProduk(None)

        daftarProduk.remove(petshop)

    # method untuk mencari produk berdasarkan nama
    def cariProduk(self, namaProduk):
        if self.getNamaProduk() == namaProduk:
            self.tampilkanProduk()
        else:
            print("Produk", namaProduk, "tidak ditemukan.")
