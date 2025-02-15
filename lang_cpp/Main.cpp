#include <iostream> // import library input/output
#include <string> // import library string
#include "Petshop.cpp" // import kelas petshop
#include <list> // import library list

using namespace std; // menggunakan standard namespace

int main(){

    string inputCommand;

    std::list<Petshop> daftarProduk;

    cout << "===========================================================" << endl;
    cout << "===== WELCOME TO MIAW MIAW PETSHOP PRODUCT MANAGEMENT =====" << endl;
    cout << "===========================================================" << endl;
    cout << "Command Line: view, add, update, delete, search" << endl;

    do{

        cin >> inputCommand;

        if (inputCommand == "view"){
            
            cout << "Menampilkan daftar Produk" << endl;
            
            for (auto& petshop : daftarProduk){
                
                petshop.tampilkanProduk();

            }

        }else if (inputCommand == "add"){

            string id, nama;
            int harga;

            // Meminta input dari user
            cout << "Masukkan ID produk: ";
            cin >> id;
            cout << "Masukkan Nama produk: ";
            cin >> nama;
            cout << "Masukkan Harga produk: ";
            cin >> harga;

            // Membuat objek Petshop baru
            Petshop produkBaru(id, nama, harga);

            // Menambahkan objek ke dalam list
            daftarProduk.push_back(produkBaru);

            cout << "Produk berhasil ditambahkan!" << endl;

        }else if (inputCommand == "update"){
            
            string namaCari;
            cout << "Masukkan nama produk yang ingin diupdate: ";
            cin >> namaCari;

            auto it = daftarProduk.begin();
            bool ditemukan = false;
            
            while (it != daftarProduk.end() && !ditemukan) {
                if (it->cariProduk(namaCari)) {
                    cout << "Produk ditemukan!" << endl;
                    it->tampilkanProduk();

                    string id, nama;
                    int harga;
        
                    // Meminta input dari user
                    cout << "Masukkan ID produk baru: ";
                    cin >> id;
                    cout << "Masukkan Nama produk baru: ";
                    cin >> nama;
                    cout << "Masukkan Harga produk baru: ";
                    cin >> harga;
        
        
                    // mengupdate objek dalam list
                    it->updateProduk(id, nama, harga);
        
                    cout << "Produk berhasil diupdate!" << endl;

                    ditemukan = true;
                } else {
                    ++it;
                }
            }
            
            if (!ditemukan) {
                cout << "Produk tidak ditemukan." << endl;
            }

        }else if (inputCommand == "delete"){

            string namaCari;
            cout << "Masukkan nama produk yang ingin di delete: ";
            cin >> namaCari;

            auto it = daftarProduk.begin();
            bool ditemukan = false;
            
            while (it != daftarProduk.end() && !ditemukan) {
                if (it->cariProduk(namaCari)) {
                    cout << "Produk ditemukan dan akan dihapus:" << endl;
                    it->tampilkanProduk();
        
                    // Menambahkan objek ke dalam list
                    it->hapusProduk(daftarProduk, it);
                    
                    cout << "Produk berhasil di delete!" << endl;

                    ditemukan = true;
                } else {
                    ++it;
                }
            }
            
            if (!ditemukan) {
                cout << "Produk tidak ditemukan." << endl;
            }


        }else if (inputCommand == "search"){

            auto it = daftarProduk.begin();
            bool ditemukan = false;

            string namaCari;
            cout << "Masukkan nama produk yang ingin dicari: ";
            cin >> namaCari;

            while (it != daftarProduk.end() && !ditemukan) {
                if (it->cariProduk(namaCari)) {
                    cout << "Produk ditemukan!" << endl;
                    it->tampilkanProduk();
                    ditemukan = true;
                } else {
                    ++it;
                }
            }

            if (!ditemukan) {
                cout << "Produk tidak ditemukan." << endl;
            }

        }

    }while(inputCommand != "Exit");
    

    return 0;
}