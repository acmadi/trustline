## Trustline

### Cara menginstal (windows)
 - Install requirement: [xampp](https://www.apachefriends.org/download.html)(web server, PHP >= 5.4, mysql), [composer](https://getcomposer.org/download).
 - Buat folder `trustline` di direktori public xampp. Biasanya di `C:\xampp\htdocs`.
 - Download source ini dan masukkan ke dalam folder `trustline`.
 - Buka command line, jalankan `composer-update` di direktori utama `trustline`.
 - Selagi menunggu update selesai, buat database baru di mysql, beri nama `db_todo`.
 - Rename `./.env.example` menjadi `.env`.
 - Edit `.env`, tambahkan konfigurasi mysql.  
      `DB_DATABASE=db_todo`  
      `DB_USERNAME=root`  
      `DB_PASSWORD=`  
 - Setelah update selesai, jalankan `composer dump-autoload`.
 - Jalankan `php artisan migrate` untuk membuat seluruh tabel.
 - Buka `localhost/trustline/public` lewat browser.

### Cara menginstal (linux)
 - Baca cara menginstal (windows).
 - Instal sendiri setau anda. Cari di google bila perlu.
 - Bantuan:
   - White blank page: `sudo chmod -R o+w storage/`
   - Encrypt error: `sudo php5enmod mcrypt; sudo apache2 restart`

### Proxified git (git bash)
   ``git config --global http.proxy http://proxyuser:proxypwd@proxy.server.com:8080``  
   ``git config --global https.proxy https://proxyuser:proxypwd@proxy.server.com:8080``  
   ``git config --global --unset http.proxy``  
   ``git config --global --unset https.proxy``  

### Git without aunthetication
`git config remote.origin.url "https://{username}:{password}@github.com/{username}/{project}.git"`
