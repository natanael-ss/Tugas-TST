<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TopicSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Aritmatika Sosial',         // isi nama topic
                'description' => 'Topik ini mencakup penerapan konsep matematika dalam kehidupan sehari-hari, seperti perhitungan keuntungan, kerugian, diskon, bunga, dan pajak. Siswa akan mempelajari cara menyelesaikan masalah yang melibatkan bilangan bulat, pecahan, dan persentase untuk memahami konsep aritmatika sosial secara praktis.',   // isi deskripsi
                'video_link' => 'https://youtu.be/VQqEdbStxsM?si=0LohetNSZiPyd6tW '    // isi link video
            ],
            [
                'name' => 'Aljabar',         // isi nama topic
                'description' => 'Aljabar memperkenalkan konsep penggunaan simbol dan huruf untuk mewakili angka dalam persamaan dan rumus. Siswa akan mempelajari cara menyelesaikan persamaan sederhana dan memahami konsep variabel.
',   // isi deskripsi
                'video_link' => 'https://youtu.be/WsQJAhCU7Q8?si=Ee3SnAJk00kpI0CB'    // isi link video
            ],
            [
                'name' => 'Geometri',         // isi nama topic
                'description' => 'Topik geometri mencakup studi tentang bentuk, ukuran, posisi relative dari figure, dan sifat ruang. Siswa akan belajar tentang titik, garis, sudut, bangun datar, dan bangun ruang.',   // isi deskripsi
                'video_link' => 'https://youtu.be/dC67zCD-OcY?si=HCcGVCtvYdnj7a2r'    // isi link video
            ],
            [
                'name' => 'Statistika',         // isi nama topic
                'description' => 'Topik ini memperkenalkan konsep pengumpulan, analisis, interpretasi, dan penyajian data. Siswa juga akan mempelajari dasar-dasar probabilitas dan bagaimana menghitung peluang dari suatu peristiwa.',   // isi deskripsi
                'video_link' => 'https://youtu.be/q8p2QrWzWLs?si=29WxkCoJOHKPNRis'    // isi link video
            ],
            [
                'name' => 'Bilangan dan Pola',         // isi nama topic
                'description' => 'Topik ini membahas berbagai jenis bilangan seperti bilangan bulat, bilangan prima, dan bilangan berpola. Siswa akan belajar mengenali dan menciptakan pola bilangan serta memahami penggunaan pola dalam matematika.',   // isi deskripsi
                'video_link' => 'https://youtu.be/5EZqO8oH3Ew?si=Rmnf2MEWgBum1ZkN'    // isi link video
            ],
            // Tambahkan data topic lain jika perlu dengan format yang sama
        ];

        $this->db->table('topics')->insertBatch($data);
    }
}