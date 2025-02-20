import java.util.List; // import library untuk list
import java.util.ListIterator; // import library untuk iterator list

public class Petshop{
// membuat class Petshop

    private String idProduk; // atribut id produk
    private String namaProduk; // atribut nama produk
    private int hargaProduk; // atribut harga produk

    Petshop(){
        // konstruktor kosong
    }

    Petshop(String idProduk, String namaProduk, int hargaProduk){
        // konstruktor langsung mengisi atribut
        this.idProduk = idProduk;
        this.namaProduk = namaProduk;
        this.hargaProduk = hargaProduk;
    }

    public void setIdProduk(String idProduk){
        // setter untuk mengisi id produk
        this.idProduk = idProduk;
    }

    public String getIdProduk(){
        // getter untuk mendapatkan id produk
        return idProduk;
    }

    public void setNamaProduk(String namaProduk){
        // setter untuk mengisi nama produk
        this.namaProduk = namaProduk;
    }

    public String getNamaProduk(){
        // getter untuk mendapatkan nama produk
        return namaProduk;
    }

    public void setHargaProduk(int hargaProduk){
        // setter untuk mengisi harga produk
        this.hargaProduk = hargaProduk;
    }

    public int getHargaProduk(){
        // getter untuk mendapatkan harga produk
        return hargaProduk;
    }

    // method untuk menampilkan detail produk
    public void tampilkanProduk(){
        System.out.println("ID Produk: " + idProduk);
        System.out.println("Nama Produk: " + namaProduk);
        System.out.println("Harga Produk: " + hargaProduk);
        System.out.println();
    }

    // method untuk mengupdate produk
    public void updateProduk(String idProdukBaru ,String namaProdukBaru, int hargaProdukBaru){
        this.idProduk = idProdukBaru;
        this.namaProduk = namaProdukBaru;
        this.hargaProduk = hargaProdukBaru;
    }

    // method untuk menghapus produk
    public void hapusProduk(List<Petshop> daftarProduk, ListIterator<Petshop> it){
        // Optional: set data ke nilai default
        idProduk = null;
        namaProduk = null;
        hargaProduk = 0;

        // Hapus elemen dari container menggunakan iterator yang diterima
        if (it != null) {
            it.remove(); // Menghapus elemen pada posisi iterator saat ini
        }
    }

    // method untuk mencari produk berdasarkan nama produk
    public static Petshop cariProduk(List<Petshop> daftarProduk, String namaProduk){
        for(Petshop p : daftarProduk){
            if(p.getNamaProduk().equalsIgnoreCase(namaProduk)){
                return p;
            }
        }
        return null; // jika produk tidak ditemukan
    }

}