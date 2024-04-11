/* Membuat Database */
CREATE DATABASE IF NOT EXISTS web_travel;

/* Menggunakan Database yang Telah Dibuat */
USE web_travel;

/* Membuat Tabel untuk Menyimpan Informasi Trip */
CREATE TABLE IF NOT EXISTS trips (
    trip_id INT AUTO_INCREMENT PRIMARY KEY,
    trip_name VARCHAR(255) NOT NULL,
    description TEXT
);

/* Menambahkan Data ke Tabel */
INSERT INTO trips (trip_name, description) VALUES 
('Explore Bali', 'An exciting journey through the beautiful island of Bali.'),
('Adventure in Java', 'Experience the history and natural wonders of Java.');

/* Memperbarui Data dalam Tabel */
UPDATE trips SET description = 'Enjoy new culture' WHERE trip_name = 'Adventure in Java';

/* Mengambil Data dari Tabel */
SELECT * FROM trips;

/* Menghapus Data dari Tabel */
DELETE FROM trips WHERE trip_name = 'Adventure in Java';

/* Menghapus Tabel */
DROP TABLE IF EXISTS trips;

