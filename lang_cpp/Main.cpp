#include <iostream> // import library input/output
#include <string> // import library string
#include "Petshop.cpp" // import kelas petshop
#include <list> // import library list

using namespace std; // menggunakan standard namespace

int main(){ // deklaraso funsgi main

    string inputCommand; // string untuk input command

    std::list<Petshop> daftarProduk; // list of objects untuk daftar product

    // terminal informations
    cout << "===========================================================" << endl;
    cout << "===== WELCOME TO MIAW MIAW PETSHOP PRODUCT MANAGEMENT =====" << endl;
    cout << "===========================================================" << endl;
    cout << "Command Line: view, add, update, delete, search, Exit" << endl;

    // loop utama
    do{

        cin >> inputCommand; // meminta masukkan input

        if (inputCommand == "view"){ // case input view
            
            cout << "Menampilkan daftar Produk" << endl;
            
            // tampilkan object dalam list
            for (auto& petshop : daftarProduk){ 
                
                petshop.tampilkanProduk();

            }

        }else if (inputCommand == "add"){ // case input add

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

        }else if (inputCommand == "update"){ // case input update
            
            // information dan meminta input dari user
            string namaCari;
            cout << "Masukkan nama produk yang ingin diupdate: ";
            cin >> namaCari;

            auto it = daftarProduk.begin();
            bool ditemukan = false;
            
            // Cari objek dalam list
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

        }else if (inputCommand == "delete"){ // case input delete

            // information dan meminta input dari user
            string namaCari;
            cout << "Masukkan nama produk yang ingin di delete: ";
            cin >> namaCari;

            auto it = daftarProduk.begin();
            bool ditemukan = false;
            
            // Cari objek dalam list
            while (it != daftarProduk.end() && !ditemukan) {
                if (it->cariProduk(namaCari)) {
                    cout << "Produk ditemukan dan akan dihapus:" << endl;
                    it->tampilkanProduk();
        
                    // menghapus objek ke dalam list
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


        }else if (inputCommand == "search"){ // case input search

            auto it = daftarProduk.begin();
            bool ditemukan = false;

            // information dan meminta input dari user
            string namaCari;
            cout << "Masukkan nama produk yang ingin dicari: ";
            cin >> namaCari;

            // Cari objek dalam list
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