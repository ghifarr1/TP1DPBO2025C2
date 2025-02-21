#include <iostream> // import library input/output
#include <string> // import library string
#include <list> // import library list

using namespace std; // menggunakan standard namespace

class Petshop{
// membuat class petshop

    // deklarasi atribut private
    private:
        string idProduk;
        string namaProduk;
        string kategoriProduk;
        int hargaProduk;

    // deklarasi method public
    public:

        // konstruktor tanpa parameter
        Petshop(){
        };

        // konstruktor dengan parameter
        Petshop(string id, string namaProduk, string kategoriProduk, int hargaProduk){
            this->idProduk = id;
            this->namaProduk = namaProduk;
            this->kategoriProduk = kategoriProduk;
            this->hargaProduk = hargaProduk;
        }

        // setter untuk id petshop
        void setId(string id){
            this->idProduk = id;
        }

        // getter untuk id petshop
        string getId(){
            return idProduk;
        }

        // setter untuk nama produk
        void setNamaProduk(string namaProduk){
            this->namaProduk = namaProduk;
        }

        // getter untuk nama produk
        string getNamaProduk(){
            return namaProduk;
        }

        // setter untuk kategori produk
        void setKategoriProduk(string kategoriProduk){
            this->kategoriProduk = kategoriProduk;
        }

        // getter untuk kategori produk
        string getKategoriProduk(){
            return kategoriProduk;
        }

        // setter untuk harga produk
        void setHargaProduk(int hargaProduk){
            this->hargaProduk = hargaProduk;
        }

        // getter untuk harga produk
        int getHargaProduk(){
            return hargaProduk;
        }

        // method untuk menampilkan detail produk
        void tampilkanProduk(){
            cout << "ID: " << idProduk << endl;
            cout << "Nama Produk: " << namaProduk << endl;
            cout << "Kategori Produk: " << kategoriProduk << endl;
            cout << "Harga Produk: " << hargaProduk << endl;
            cout << endl;
        }

        // method untuk mengupdate produk
        void updateProduk(string idProdukBaru, string namaProdukBaru, string ketegoriProdukBaru, int hargaProdukBaru){
            this->idProduk = idProdukBaru;
            this->namaProduk = namaProdukBaru;
            this->kategoriProduk = ketegoriProdukBaru;
            this->hargaProduk = hargaProdukBaru;    
        }

        // Method untuk menghapus dirinya sendiri dari container
        // Parameter: reference ke container dan iterator yang menunjuk ke objek ini
        void hapusProduk(list<Petshop>& daftarProduk, list<Petshop>::iterator it) {
            // Optional: set data ke nilai default
            idProduk = "";
            namaProduk = "";
            kategoriProduk = "";
            hargaProduk = 0;
            
            // Hapus elemen dari container menggunakan iterator yang diterima
            daftarProduk.erase(it);
        }

        // method untuk mencari produk berdasarkan nama
        bool cariProduk(string namaProduk){
            return this->namaProduk == namaProduk;
        }

        ~Petshop(){
            // destruktor
        }

        
};