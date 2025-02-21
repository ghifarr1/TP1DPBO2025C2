from Petshop import Petshop # import class dari module

def main(): # deklarasi main function

    inputCommand = "" # var input command

    daftarProduk = [] # list of objects daftarProduk

    # information dan command line
    print("===========================================================\n")
    print("===== WELCOME TO MIAW MIAW PETSHOP PRODUCT MANAGEMENT =====\n")
    print("===========================================================\n")
    print("Command Line: view, add, update, delete, search, Exit\n")

    running = True # mark running

    # loop utama
    while running: 

        inputCommand = input("Enter your command: ") # meminta masukkan user

        if inputCommand == "view": # case input view
            
            print("Menampilkan daftar Produk\n")

            # tampilkan object dalam list
            for petshop in daftarProduk: 
                petshop.tampilkanProduk()

            
        
        elif inputCommand == "add": # case input add
            
            # meminta masukkan user
            idProduk = input("Masukkan ID produk: ")
            namaProduk = input("Masukkan Nama produk: ")
            kategoriProduk = input("Masukkan Kategori produk: ")
            hargaProduk = int(input("Masukkan harga produk: "))

            # tambahkan ke dalam list
            petshop = Petshop(idProduk, namaProduk, kategoriProduk, hargaProduk)
            daftarProduk.append(petshop)

            print("Produk berhasil ditambahkan\n")

        elif inputCommand == "update": # case input update
            
            # meminta masukkan user
            namaProduk = input("Masukkan nama produk yang ingin diupdate: ")
            
            found = False
            i = 0

            # cari object dalam list
            while i < len(daftarProduk) and not found:
                petshop = daftarProduk[i]
                
                # case object ditemukan
                if petshop.getNamaProduk() == namaProduk:
                    print("Produk ditemukan!\n")
                    petshop.tampilkanProduk()

                    # minta masukkan ke user
                    idProdukBaru = input("Masukkan ID produk baru: ")
                    namaProdukBaru = input("Masukkan Nama produk baru: ")
                    kategoriProdukBaru = input("Masukkan Kategori produk baru: ")
                    hargaProdukBaru = int(input("Masukkan Harga produk baru: "))

                    # update object
                    petshop.updateProduk(idProdukBaru, namaProdukBaru, kategoriProdukBaru, hargaProdukBaru)
                    print("Produk berhasil diupdate\n")
                    
                    found = True  # Tandai bahwa produk telah ditemukan dan diupdate

                i += 1
            
            if not found:
                print("Produk tidak ditemukan\n")

        elif inputCommand == "delete": # case input delete
            
            # meminta masukkan user
            namaProduk = input("Masukkan nama produk yang ingin dihapus: ")
            
            found = False
            i = 0

            # cari object dalam list
            while i < len(daftarProduk) and not found:
                petshop = daftarProduk[i]
                
                # case object ditemukan
                if petshop.getNamaProduk() == namaProduk:
                    print("Produk ditemukan!\n")
                    petshop.tampilkanProduk()

                    # hapus object
                    petshop.hapusProduk(daftarProduk)
                    print("Produk berhasil di delete!\n")

                    found = True  # Tandai bahwa produk telah ditemukan dan dihapus

                i += 1

            if not found:
                print("Produk tidak ditemukan\n")

        elif inputCommand == "search": # case input search
            
            # meminta masukkan user
            namaProduk = input("Masukkan nama produk yang ingin dicari: ")
            
            found = False
            i = 0

            # cari object dalam list 
            while i < len(daftarProduk) and not found:
                petshop = daftarProduk[i]
                
                # case object ditemukan
                if petshop.getNamaProduk() == namaProduk:
                    print("Produk ditemukan!\n")
                    petshop.tampilkanProduk()

                    found = True  # Tandai bahwa produk telah ditemukan dan dihapus

                i += 1

            if not found:
                print("Produk tidak ditemukan\n")

        # exit loop
        elif inputCommand == "Exit":
            
            running = False # running false/off

# panggil main func
if __name__ == "__main__":
    main()
