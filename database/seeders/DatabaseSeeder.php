<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@umkm.test'], [
            'name' => 'Admin Abay Kopi',
            'password' => 'password',
            'is_admin' => true,
        ]);

        $categoryData = [
            'kopi-sumatra' => ['Kopi Sumatra', 'Kopi pilihan dari dataran tinggi Sumatra dengan karakter kaya dan berlapis.'],
            'kopi-sulawesi' => ['Kopi Sulawesi', 'Kopi Sulawesi dengan keseimbangan rasa dan jejak rempah yang khas.'],
            'kopi-jawa-bali' => ['Kopi Jawa & Bali', 'Kopi dari tanah vulkanik Jawa dan Bali dengan profil rasa yang beragam.'],
            'kopi-nusa-tenggara' => ['Kopi Nusa Tenggara', 'Kopi Nusa Tenggara yang tumbuh dari kebun-kebun lokal pilihan.'],
        ];

        $categories = [];
        foreach ($categoryData as $slug => [$name, $description]) {
            $categories[$slug] = Category::updateOrCreate(
                ['slug' => $slug],
                ['name' => $name, 'description' => $description],
            );
        }

        $products = [
            ['Gayo Aceh', 'gayo-aceh', 'kopi-sumatra', 125000, '#6F4E37', 'Aroma rempah, cokelat gelap, dan sedikit karamel. Body medium ke penuh dengan acidity seimbang dan bersih.'],
            ['Mandailing', 'mandailing', 'kopi-sumatra', 118000, '#805A3B', 'Aroma cokelat, tembakau manis, dan rempah. Body tebal dan lembut dengan acidity rendah yang nyaman.'],
            ['Toraja Sapan', 'toraja-sapan', 'kopi-sulawesi', 145000, '#4E342E', 'Aroma buah matang, kakao, dan rempah. Body penuh, tekstur halus, serta acidity sedang yang kompleks.'],
            ['Kintamani Bali', 'kintamani-bali', 'kopi-jawa-bali', 132000, '#D97706', 'Aroma jeruk segar dan bunga. Body ringan hingga medium dengan acidity cerah dan bersih.'],
            ['Flores Bajawa', 'flores-bajawa', 'kopi-nusa-tenggara', 122000, '#9A5B35', 'Aroma cokelat, kacang, dan herbal lembut. Body medium dengan acidity lembut dan seimbang.'],
            ['Java Preanger', 'java-preanger', 'kopi-jawa-bali', 138000, '#6B4F3A', 'Aroma floral, rempah, dan gula aren. Body medium, rasa manis yang panjang, serta acidity segar.'],
        ];

        foreach ($products as [$name, $slug, $categorySlug, $price, $color, $description]) {
            $imagePath = 'products/'.$slug.'.svg';
            $safeName = htmlspecialchars($name, ENT_XML1 | ENT_QUOTES, 'UTF-8');
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600">'
                .'<rect width="800" height="600" fill="'.$color.'"/>'
                .'<circle cx="650" cy="135" r="180" fill="#FEF3C7" opacity=".12"/>'
                .'<path d="M0 470Q180 380 360 470t440 0v130H0z" fill="#3E2723" opacity=".36"/>'
                .'<text x="64" y="286" fill="#FEF3C7" font-family="Georgia,serif" font-size="54">'.$safeName.'</text>'
                .'<text x="66" y="342" fill="#FEF3C7" font-family="Arial,sans-serif" font-size="22" letter-spacing="5">ABAY KOPI NUSANTARA</text>'
                .'</svg>';

            Storage::disk('public')->put($imagePath, $svg);
            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'category_id' => $categories[$categorySlug]->id,
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'image' => $imagePath,
                    'is_active' => true,
                ],
            );
        }
    }
}
