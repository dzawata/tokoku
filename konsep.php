<?php

/*
Konsep system:

1. Level user : Administrator, Pemilik Toko/Customer, Customer

Level Administrator :
- Melihat jumlah user dengan status pemilik toko sekaligus customer atau user dg status customer saja.
- Kelola user (toko/cutomer) dan bisa me banned user.
- Melihat transaksi per bulan
- Melihat produk yang paling banyak di beli

Level Pemilik Toko :
- Kelola produk
- Kelola category
- Kelola image produk
- Melihat transaksi

Level User:
- Memesan barang
- Checkout pesanan
- Cancel pesanan

2. Calon customer melakukan registrasi, sekaligus registrasi untuk membuka Toko
3. Setiap user customer/pemilik toko memiliki role seperti diatas.
3. Ketika berhasil login, user dengan jenis customer hanya bisa mengakses menu Dashboard, Transaction(belanjaan), chart, profile. Berbeda dengan pemili toko yang bisa bisa mengakses dashboard, transaction(pesanan), product, category, gallery

*/