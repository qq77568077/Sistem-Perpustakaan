## create datatables

cara membuat datatable
php artisan datatables:make Prodi
php artisan datatables:make Mahasiswa
php artisan datatables:make Plagiarism
php artisan datatables:make PengajuanPlagiarism
php artisan datatables:make Berkas
php artisan datatables:make Jilid
php artisan datatables:make Price
php artisan datatables:make Document

//request validasi

## create Request

php artisan make:request PermissionRequest
php artisan make:request PlagiarismRequest
php artisan make:request JilidRequest

## create controller & model

php artisan make:controller PlagiarismController -r
php artisan make:controller perpustakaan/PengajuanPlagiarismController -r
php artisan make:controller perpustakaan/PengajuanJilidController -r
php artisan make:model Plagiarism -m
php artisan make:model Term -m

php artisan make:controller TermController -r
php artisan make:controller ProdiController -r
php artisan make:controller MahasiswaController -r

php artisan make:controller FileController -r
php artisan make:model File -m

php artisan make:controller DocumentController -r
php artisan make:model Document -m

php artisan make:controller JilidController -r
php artisan make:model Jilid -m
php artisan make:model Pengumpulan -m

# Example

# Generate a model and a FlightFactory class...
php artisan make:model Flight --factory
php artisan make:model Flight -f
 
# Generate a model and a FlightSeeder class...
php artisan make:model Flight --seed
php artisan make:model Flight -s
 
# Generate a model and a FlightController class...
php artisan make:model Flight --controller
php artisan make:model Flight -c
 
# Generate a model, FlightController resource class, and form request classes...
php artisan make:model Flight --controller --resource --requests
php artisan make:model Flight -crR
 
# Generate a model and a FlightPolicy class...
php artisan make:model Flight --policy
 
# Generate a model and a migration, factory, seeder, and controller...
php artisan make:model Flight -mfsc
 
# Shortcut to generate a model, migration, factory, seeder, policy, controller, and form requests...
php artisan make:model Flight --all
 
# Generate a pivot model...
php artisan make:model cekplagiarism --pivot

## instalasi

git clone https://github.com/qq77568077/Sistem-Perpustakaan.git
composer install
php artisan migrate:fresh --seed
php artisan serve
npm run dev

mebuat database di phpmyadmin dengan nama SistemPerpus


## Update Terbaru Rev Program

- Dashboard
    ## user
    - Menampilkan Syarat Ketentuan v
    - Menampilkan data harga pada database v

  ## perpustakaan
  - Harga v
  - Plagiarisme
    - jika kurang dari 10 maka dapat upload ulang v
  - Jilid laporan
    - penambahan status status file tidak bisa di buka & upload file baru pada user V
    - menambahkan update status file tidak bisa di buka v
    - menambahkan update status approved pembayaran setelah user sudah upload bukti bayar v
    - jadi ada approved laporan sama approved pembayaran  v
    - tambahkan update status proses untuk yang setelah approved pembayaran , sebelum update status selesai  v
     
  ## user
  - Plagiarisme
    - jika kurang dari 10 maka dapat upload ulang v
  - jilid
    - menambah pembayaran pada tabel v
    - halaman baru untuk pembayaran v
    - keterangan disesuaikan dengan jumlah halaman berwarna ?
    - Di form pengajuan di tambahkan catatan , pengambilan berkas dapat di ambil setelah approved pengambayaran v

## Revisi Laporan

- pengujian program di sesuaikan usecase
  ditambahkan 1 tabel lagi
  judul melakukan cek plagiarisme
  proses upload link file laporan untuk di cek
  output , file berhasil di kirim atau tersimpan
  berhak tidak berhak di sesuaikan dengan fungsinya

  tambahkan keterangan
  berdasarkan adalah hasil pengujian terhadap fungsi
  1. nomor
  2. nama fungsi
  3. kegunaan
  4. output yang di harapkan
  5. kesesuaian