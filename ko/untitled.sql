create table barang(
	id int AUTO_INCREMENT PRIMARY KEY,
	kode varchar(15),
	nama varchar(50)
);

create table inventori(
	id int AUTO_INCREMENT PRIMARY KEY,
	id_barang int,
	merk varchar(50),
	no_sertifikat varchar(50),
	bahan varchar(50),
	asal varchar(50),
	tanggal date,
	ukuran varchar(50),
	satuan varchar(50),
	kondisi varchar(15),
	jumlah varchar(50),
	harga varchar(50),
	keterangan varchar(50)
);