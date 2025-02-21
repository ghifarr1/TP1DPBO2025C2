import java.util.Scanner; // import lib untuk input
import java.util.List; // import lib untuk list
import java.util.ArrayList; // import lib untuk array list
import java.util.ListIterator; // import lib untuk list iterator

public class Main { // membuat main class 

    public static void main(String[] args) {  // main program methods

        String inputCommand; // string untuk input command

        List<Petshop> daftarProduk = new ArrayList<Petshop>();  // deklarasi list of objects

        // terminal informations
        System.out.println("===========================================================");
        System.out.println("===== WELCOME TO MIAW MIAW PETSHOP PRODUCT MANAGEMENT =====");
        System.out.println("===========================================================");
        System.out.println("Command Line: view, add, update, delete, search, Exit");

        // loop utama
        do{

            Scanner sc = new Scanner(System.in); // deklarasi scanner input

            inputCommand = sc.next(); // meminta masukkan user untuk input command

            if(inputCommand.equals("view")){ // case input view

                System.out.println("Menampilkan daftar Produk"); 

                for(Petshop petshop : daftarProduk){ // loop untuk menampilkan isi list

                    petshop.tampilkanProduk(); // panggil method tampilkan produk

                }

            }else if(inputCommand.equals("add")){ // case input add

                // var temp
                String id, nama, kategori; 
                int harga;

                // meminta masukkan user untuk add data ke list
                System.out.print("Masukkan ID Produk: ");
                id = sc.next();
                System.out.print("Masukkan Nama Produk: ");
                nama = sc.next();
                System.out.print("Masukkan Kategori Produk: ");
                kategori = sc.next(); 
                System.out.print("Masukkan Harga Produk: ");
                harga = sc.nextInt();

                Petshop petshop = new Petshop(id, nama, kategori, harga); // instansiasi object

                daftarProduk.add(petshop); // tambahkan ke dalam list

                System.out.println("Produk berhasil ditambahkan!");

            }else if(inputCommand.equals("update")){ // case input update

                String namaCari; // var cari nama produk
                System.out.print("Masukkan nama produk yang ingin diupdate: ");
                namaCari = sc.next(); // meminta masukkan user 

                Petshop petshop = Petshop.cariProduk(daftarProduk, namaCari); // memanggil method mencari object dalam list berdasarkan nama
                
                if(petshop!= null){ // jika tidak null

                    System.out.println("Produk ditemukan!");
                    petshop.tampilkanProduk(); // tampilkan produk

                    // var temp untuk inputan update
                    String idBaru, namaBaru, kategoriBaru;
                    int hargaBaru;

                    // meminta masukkan user untuk update data produk
                    System.out.print("Masukkan ID Produk Baru: ");
                    idBaru = sc.next();
                    System.out.print("Masukkan Nama Produk Baru: ");
                    namaBaru = sc.next();
                    System.out.print("Masukkan Kategori Produk Baru: ");
                    kategoriBaru = sc.next();
                    System.out.print("Masukkan Harga Produk Baru: ");
                    hargaBaru = sc.nextInt();

                    petshop.updateProduk(idBaru, namaBaru, kategoriBaru, hargaBaru); // panggil method update

                    System.out.println("Produk berhasil diupdate!");


                } else {

                    System.out.println("Produk tidak ditemukan!");

                }


            }else if(inputCommand.equals("delete")){ // case input delete

                System.out.print("Masukkan nama produk yang ingin dihapus: ");
                String namaCari = sc.next(); // meminta masukkan user untuk nama produk object yg dicari

                Petshop petshop = Petshop.cariProduk(daftarProduk, namaCari); // panggil method cari object dengan nama

                if (petshop != null) { // jika tidak null
                    System.out.println("Produk ditemukan!");
                    petshop.tampilkanProduk(); // tampilkan objecy

                    boolean found = false;
                    ListIterator<Petshop> iterator = daftarProduk.listIterator(); // deklarasi iterator object dalam list
                    
                    while (iterator.hasNext() && !found) { // perulangan untuk mencari object

                        if (iterator.next().equals(petshop)) { // Cek apakah elemen yang ditemukan sesuai

                            petshop.hapusProduk(daftarProduk, iterator); // panggil method hapus produk
                            System.out.println("Produk berhasil dihapus!");
                            found = true;

                        }

                    }

                    if (!found) {
                        System.out.println("Produk tidak ditemukan dalam daftar!");
                    }

                } else {
                    System.out.println("Produk tidak ditemukan!");
                }

            }else if(inputCommand.equals("search")){ // case input search

                String namaCari; // var untuk nama yg dicari
                System.out.print("Masukkan nama produk yang ingin dicari: ");
                namaCari = sc.next(); // meminta masukkan user

                Petshop petshop = Petshop.cariProduk(daftarProduk, namaCari); // panggil method untuk mencari object dgn nama
                
                if(petshop!= null){ // jika tidak null

                    System.out.println("Produk ditemukan!");
                    petshop.tampilkanProduk(); // tampilkan produk

                } else {

                    System.out.println("Produk tidak ditemukan!");

                }

            }

        }while(!inputCommand.equals("Exit")); 

    }

}