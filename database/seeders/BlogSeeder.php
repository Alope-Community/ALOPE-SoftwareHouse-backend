<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'blog_category_id' => 1,
                'title' => 'Panduan Belajar HTML & CSS untuk Pemula',
                'image' => 'images/frontend-html-css.jpg',
                'content' => 'HTML dan CSS adalah fondasi utama dalam pengembangan web. Pelajari cara membuat layout, form, dan komponen UI dari dasar.',
            ],
            [
                'blog_category_id' => 1,
                'title' => 'React vs Vue: Mana yang Lebih Cocok untuk Proyekmu?',
                'image' => 'images/frontend-react-vue.jpg',
                'content' => 'React unggul dalam ekosistem, sedangkan Vue lebih mudah untuk pemula. Artikel ini membandingkan keduanya dari berbagai aspek.',
            ],
            [
                'blog_category_id' => 1,
                'title' => 'Membuat UI Modern dengan Tailwind CSS',
                'image' => 'images/frontend-tailwind.jpg',
                'content' => 'Tailwind adalah framework CSS utility-first yang memungkinkan pembuatan antarmuka cepat dan responsif tanpa menulis CSS kustom.',
            ],
            [
                'blog_category_id' => 2,
                'title' => 'Laravel 11: Apa yang Baru di Versi Terbaru?',
                'image' => 'images/backend-laravel11.jpg',
                'content' => 'Laravel 11 memperkenalkan fitur Route Attributes dan lebih banyak peningkatan performa untuk developer backend.',
            ],
            [
                'blog_category_id' => 2,
                'title' => 'Node.js dan Express: Bangun REST API dengan Cepat',
                'image' => 'images/backend-node-express.jpg',
                'content' => 'Express adalah framework minimalis yang sering digunakan bersama Node.js untuk membangun API yang ringan dan cepat.',
            ],
            [
                'blog_category_id' => 2,
                'title' => 'Konsep MVC: Memahami Arsitektur Backend Modern',
                'image' => 'images/backend-mvc.jpg',
                'content' => 'Model-View-Controller adalah pola desain umum dalam pengembangan backend yang membantu pemisahan logika aplikasi.',
            ],
            [
                'blog_category_id' => 3,
                'title' => 'Kecerdasan Buatan: Tren dan Aplikasi di Tahun 2025',
                'image' => 'images/tech-ai.jpg',
                'content' => 'AI digunakan dalam berbagai sektor seperti kesehatan, pendidikan, dan otomasi industri. Ini tren yang wajib diikuti!',
            ],
            [
                'blog_category_id' => 3,
                'title' => 'Teknologi 5G dan Dampaknya pada Dunia Digital',
                'image' => 'images/tech-5g.jpg',
                'content' => '5G memberikan kecepatan tinggi dan latency rendah. Sangat ideal untuk IoT, kendaraan otonom, dan augmented reality.',
            ],
            [
                'blog_category_id' => 3,
                'title' => 'Quantum Computing: Masa Depan Komputasi Modern',
                'image' => 'images/tech-quantum.jpg',
                'content' => 'Komputasi kuantum menawarkan potensi besar untuk memecahkan masalah yang tidak dapat diselesaikan oleh komputer klasik.',
            ],
            [
                'blog_category_id' => 4,
                'title' => 'Flutter vs React Native: Pilih yang Mana?',
                'image' => 'images/mobile-flutter-rn.jpg',
                'content' => 'Flutter lebih konsisten di tampilan UI, sedangkan React Native punya keunggulan integrasi dengan ekosistem JavaScript.',
            ],
            [
                'blog_category_id' => 4,
                'title' => 'Membangun Aplikasi Android dengan Kotlin',
                'image' => 'images/mobile-kotlin.jpg',
                'content' => 'Kotlin adalah bahasa resmi Android yang modern dan aman. Cocok untuk pengembangan aplikasi mobile native.',
            ],
            [
                'blog_category_id' => 4,
                'title' => 'Strategi Merilis Aplikasi Mobile ke App Store & Play Store',
                'image' => 'images/mobile-publish.jpg',
                'content' => 'Pelajari langkah-langkah validasi, testing, dan publikasi aplikasi mobile ke dua platform utama dunia.',
            ],
            [
                'blog_category_id' => 5,
                'title' => 'CI/CD dengan GitHub Actions: Otomatisasi Build & Deploy',
                'image' => 'images/devops-github-actions.jpg',
                'content' => 'GitHub Actions memudahkan otomatisasi pipeline development dari testing hingga deployment aplikasi.',
            ],
            [
                'blog_category_id' => 5,
                'title' => 'Docker 101: Menjalankan Aplikasi di Kontainer',
                'image' => 'images/devops-docker.jpg',
                'content' => 'Docker membuat proses deployment jadi lebih mudah dan konsisten di berbagai environment.',
            ],
            [
                'blog_category_id' => 5,
                'title' => 'Apa Itu Kubernetes dan Mengapa Dibutuhkan?',
                'image' => 'images/devops-kubernetes.jpg',
                'content' => 'Kubernetes adalah sistem orkestrasi container yang membantu pengelolaan aplikasi dalam skala besar.',
            ],
        ];

        foreach ($blogs as $index => $blog) {
            Blog::create([
                'blog_category_id' => $blog['blog_category_id'],
                'title' => $blog['title'],
                'slug' => \Illuminate\Support\Str::slug($blog['title']) . '-' . ($index + 1),
                'image' => $blog['image'],
                'content' => $blog['content'],
                'created_at' => now()->addMonths($index),
            ]);
        }
    }
}
