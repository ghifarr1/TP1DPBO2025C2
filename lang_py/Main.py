from Petshop import Petshop

def main():

    inputCommand = ""

    daftarProduk = []

    print("===========================================================\n")
    print("===== WELCOME TO MIAW MIAW PETSHOP PRODUCT MANAGEMENT =====\n")
    print("===========================================================\n")
    print("Command Line: view, add, update, delete, search, Exit\n")

    running = True

    while running:

        inputCommand = input("Enter your command: ")

        if inputCommand == "view":
            
            print("Menampilkan daftar Produk\n")

            for petshop in daftarProduk:
                petshop.tampilkanProduk()

            
        
        elif inputCommand == "add":
            
            idProduk = input("Masukkan ID produk: ")
            namaProduk = input("Masukkan Nama produk: ")
            hargaProduk = int(input("Masukkan harga produk: "))

            petshop = Petshop(idProduk, namaProduk, hargaProduk)
            daftarProduk.append(petshop)

            print("Produk berhasil ditambahkan\n")

        elif inputCommand == "update":
            
            namaProduk = input("Masukkan nama produk yang ingin diupdate: ")
            
            found = False
            i = 0

            while i < len(daftarProduk) and not found:
                petshop = daftarProduk[i]
                
                if petshop.getNamaProduk() == namaProduk:
                    print("Produk ditemukan!\n")
                    petshop.tampilkanProduk()

                    idProdukBaru = input("Masukkan ID produk baru: ")
                    namaProdukBaru = input("Masukkan Nama produk baru: ")
                    hargaProdukBaru = int(input("Masukkan Harga produk baru: "))

                    petshop.updateProduk(idProdukBaru, namaProdukBaru, hargaProdukBaru)
                    print("Produk berhasil diupdate\n")
                    
                    found = True  # Tandai bahwa produk telah ditemukan dan diupdate

                i += 1
            
            if not found:
                print("Produk tidak ditemukan\n")

        elif inputCommand == "delete":
            
            namaProduk = input("Masukkan nama produk yang ingin dihapus: ")
            
            found = False
            i = 0

            while i < len(daftarProduk) and not found:
                petshop = daftarProduk[i]
                
                if petshop.getNamaProduk() == namaProduk:
                    print("Produk ditemukan!\n")
                    petshop.tampilkanProduk()

                    petshop.hapusProduk(daftarProduk)
                    print("Produk berhasil di delete!\n")

                    found = True  # Tandai bahwa produk telah ditemukan dan dihapus

                i += 1

            if not found:
                print("Produk tidak ditemukan\n")

        elif inputCommand == "search":
            
            namaProduk = input("Masukkan nama produk yang ingin dicari: ")
            
            found = False
            i = 0

            while i < len(daftarProduk) and not found:
                petshop = daftarProduk[i]
                
                if petshop.getNamaProduk() == namaProduk:
                    print("Produk ditemukan!\n")
                    petshop.tampilkanProduk()

                    found = True  # Tandai bahwa produk telah ditemukan dan dihapus

                i += 1

            if not found:
                print("Produk tidak ditemukan\n")

        elif inputCommand == "Exit":
            
            running = False

if __name__ == "__main__":
    main()
