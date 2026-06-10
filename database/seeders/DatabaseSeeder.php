<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use App\Models\Service;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedAdminUser();
        $this->seedCompanyProfile();
        $this->seedSliders();
        $this->seedServices();
    }

    private function seedAdminUser(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cls.co.id'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'superadmin',
                'is_active' => true,
            ],
        );
    }

    private function seedCompanyProfile(): void
    {
        $profiles = [
            'about' => 'CV. Cakrawala Langit Semesta adalah sebuah perusahaan yang bergerak di bidang General Supplier, yang menjadikan berbagai jenis produk dan jasa untuk memenuhi kebutuhan customer. Kami berkomitmen untuk memberikan pelayanan yang terbaik dan produk yang berkualitas pada customer.',
            'visi' => 'Menjadikan perusahaan General Supplier dengan reputasi dan pelayanan yang baik serta berkualitas tinggi.',
            'misi' => 'Menjadikan produk dan jasa yang berkualitas tinggi, memberikan pelayanan yang baik dengan customer.',
            'alamat' => 'Jakarta, Indonesia',
            'telepon' => '(021) 1234-5678',
            'email' => 'info@cls.co.id',
            'whatsapp' => '081234567890',
        ];

        foreach ($profiles as $key => $value) {
            CompanyProfile::setValue($key, $value);
        }
    }

    private function seedSliders(): void
    {
        $sliders = [
            [
                'title' => 'CV. Cakrawala Langit Semesta',
                'subtitle' => 'General Supplier Terpercaya',
                'description' => 'Menyediakan berbagai produk dan jasa berkualitas untuk memenuhi kebutuhan Anda',
                'image' => 'sliders/slide-1.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Produk Berkualitas',
                'subtitle' => 'Beragam Pilihan Produk & Jasa',
                'description' => 'Dari ATK hingga kontraktor bangunan, kami siap melayani kebutuhan Anda',
                'image' => 'sliders/slide-2.jpg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Komitmen Terbaik',
                'subtitle' => 'Pelayanan Prima untuk Customer',
                'description' => 'Kami berkomitmen memberikan pelayanan terbaik dan produk berkualitas',
                'image' => 'sliders/slide-3.jpg',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::updateOrCreate(
                ['title' => $slider['title']],
                $slider,
            );
        }
    }

    private function seedServices(): void
    {
        $categories = [
            'Perlengkapan Kantor' => [
                'ATK',
                'Part IT',
                'Lampu Philips',
            ],
            'Mekanikal & Elektrikal' => [
                'HT',
                'AC & Pemasangan',
                'AC Chiller',
                'Electrical Listrik',
                'Mekanikal',
            ],
            'Percetakan & Dekorasi' => [
                'Printing (Sticker & Banner)',
                'Boot (Dekorasi)',
                'Design Interior',
                'Interior',
            ],
            'Bahan Bangunan' => [
                'Bahan Bangunan',
                'Kaca & Pemasangan (Alumunium)',
                'Marmer dan Jasa Pasang',
                'Kayu',
            ],
            'Safety & Security' => [
                'Safety',
                'CCTV',
            ],
            'Furniture & Interior' => [
                'Furniture',
                'Karpet',
                'Rak Besi',
                'Meja Meeting',
            ],
            'Event & Jasa' => [
                'Event',
                'EO',
                'Flower',
            ],
            'Lainnya' => [
                'Polyfoam dan Styrofoam',
                'Vanbelt',
                'Kontraktor Bangunan',
            ],
        ];

        $order = 1;

        foreach ($categories as $category => $services) {
            foreach ($services as $serviceName) {
                Service::updateOrCreate(
                    ['name' => $serviceName, 'category' => $category],
                    [
                        'order' => $order++,
                        'is_active' => true,
                    ],
                );
            }
        }
    }
}
