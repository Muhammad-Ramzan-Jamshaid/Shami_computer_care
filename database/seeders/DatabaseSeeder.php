<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@shamipc.com'],
            [
                'name' => 'Store Administrator',
                'password' => bcrypt('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Categories Structure
        $structure = [
            'Laptops' => ['Dell Laptops', 'HP Laptops', 'Lenovo Laptops', 'ASUS Laptops', 'Apple MacBooks'],
            'Cables' => ['HDMI Cables', 'Ethernet Cables', 'Power Cables', 'VGA Cables'],
            'Laptop Chargers' => [],
            'Storage Devices' => ['Solid State Drives (SSDs)', 'Hard Disk Drives (HDDs)'],
            'USBs' => ['Kingston USBs', 'SanDisk USBs', 'Samsung USBs', 'HP USBs'],
            'Speakers' => [],
            'Converters' => ['VGA to HDMI Converters', 'HDMI to VGA Converters'],
            'Keyboards' => [],
            'Mice' => [],
            'Headphones' => []
        ];

        $categoryMap = [];

        foreach ($structure as $parentName => $children) {
            $parent = Category::updateOrCreate(
                ['slug' => Str::slug($parentName)],
                ['name' => $parentName, 'parent_id' => null]
            );
            $categoryMap[$parentName] = $parent;

            foreach ($children as $childName) {
                $child = Category::updateOrCreate(
                    ['slug' => Str::slug($childName)],
                    ['name' => $childName, 'parent_id' => $parent->id]
                );
                $categoryMap[$childName] = $child;
            }
        }

        // 3. Seed Sample Products
        $products = [
            [
                'category' => 'Dell Laptops',
                'name' => 'Dell Latitude 5420 Core i5',
                'description' => 'Business class lightweight laptop. Powered by Intel Core i5 11th Gen, 16GB RAM, and 512GB NVMe SSD. Features a crystal clear 14" Full HD screen and excellent keyboard travel.',
                'price' => 135000,
                'image_path' => null
            ],
            [
                'category' => 'HP Laptops',
                'name' => 'HP EliteBook 840 G8 Core i7',
                'description' => 'Premium aluminum business notebook. Intel Core i7 11th Gen, 16GB DDR4 RAM, 1TB NVMe high-speed SSD, Backlit keyboard, and Fingerprint security. Sleek and durable.',
                'price' => 165000,
                'image_path' => null
            ],
            [
                'category' => 'Lenovo Laptops',
                'name' => 'Lenovo ThinkPad L14 Core i5',
                'description' => 'Legendary reliability. Intel Core i5 10th Gen, 8GB RAM, 256GB SSD, spill-resistant keyboard, and long-lasting battery life. Ideal for students and office workers.',
                'price' => 108000,
                'image_path' => null
            ],
            [
                'category' => 'Apple MacBooks',
                'name' => 'MacBook Pro M2 Space Gray',
                'description' => 'Supercharged by Apple M2 chip. Features an 8-core CPU, 10-core GPU, 8GB unified memory, and 512GB super-fast SSD storage. Liquid Retina display and up to 20 hours battery life.',
                'price' => 320000,
                'image_path' => null
            ],
            [
                'category' => 'HDMI Cables',
                'name' => 'Premium Gold-Plated HDMI 4K Cable',
                'description' => 'Ultra high-speed 5m HDMI cable supporting true 4K resolution at 60Hz. Heavy duty braided nylon sleeve protects signal loss and enhances stability.',
                'price' => 2200,
                'image_path' => null
            ],
            [
                'category' => 'Ethernet Cables',
                'name' => 'CAT6 High-Speed RJ45 Network Cable Box',
                'description' => 'Full roll of 305 meters high-speed copper CAT6 Ethernet cable. Excellent bandwidth capability up to 250 MHz for commercial networking projects.',
                'price' => 18500,
                'image_path' => null
            ],
            [
                'category' => 'Kingston USBs',
                'name' => 'Kingston DataTraveler Exodia 64GB',
                'description' => 'High speed USB 3.2 Gen 1 flash drive. Features quick read/write speeds, protective loop cap, and robust build quality. Essential storage companion.',
                'price' => 1600,
                'image_path' => null
            ],
            [
                'category' => 'Speakers',
                'name' => '2.1 Multimedia Speaker System with Woofer',
                'description' => 'Powerful computer audio speaker set featuring a heavy bass subwoofer. Bluetooth enabled, USB/SD card input, and remote controller. 40W RMS total power output.',
                'price' => 4500,
                'image_path' => null
            ],
            [
                'category' => 'VGA to HDMI Converters',
                'name' => 'VGA to HDMI Converter Adapter with Audio',
                'description' => 'Converts old computer analog VGA output to digital HDMI input on modern screens. Includes dedicated 3.5mm AUX audio transmission line.',
                'price' => 1200,
                'image_path' => null
            ]
        ];

        foreach ($products as $p) {
            $category = $categoryMap[$p['category']] ?? null;
            if ($category) {
                Product::updateOrCreate(
                    ['slug' => Str::slug($p['name'])],
                    [
                        'category_id' => $category->id,
                        'name' => $p['name'],
                        'description' => $p['description'],
                        'price' => $p['price'],
                        'image_path' => $p['image_path']
                    ]
                );
            }
        }

        // 4. Seed Sample Projects
        $projects = [
            [
                'title' => 'Commercial Plaza CCTV & Security Network Installation',
                'category' => 'CCTV Surveillance & Security',
                'client' => 'Shami Commercial Center, Farooqabad',
                'description' => 'Complete end-to-end installation of 32 IP HD CCTV Cameras, centralized NVR storage, night-vision infrared vision, and remote monitoring setup on mobile app.',
                'details' => 'Installed high-definition Dahua/Hikvision cameras, 16-channel POE switches, CAT6 structured cabling, and 8TB surveillance hard disks with 24/7 backup capabilities.',
                'image_path' => null
            ],
            [
                'title' => 'Government High School Computer Lab Setup',
                'category' => 'Government Supplies & IT Lab',
                'client' => 'Education Department, Sheikhupura District',
                'description' => 'Deployed 25 desktop workstations, high-speed Gigabit network switches, laser printers, and heavy duty UPS power backups for student computer lab.',
                'details' => 'Supplied branded Core i5 computer sets, 22-inch LED monitors, CAT6 cabling, surge protectors, and configured Windows 11 Pro for educational environments.',
                'image_path' => null
            ],
            [
                'title' => 'Corporate Office Fiber Optic & Wi-Fi Network',
                'category' => 'Networking & Fiber Connectivity',
                'client' => 'Al-Rehman Business Tower',
                'description' => 'Designed and deployed high-performance dual-band Wi-Fi access points, fiber optic backbone connectivity, and organized server rack assembly.',
                'details' => 'Includes cable management, patch panel termination, Mikrotik router routing, VLAN setup, and network bandwidth optimization.',
                'image_path' => null
            ],
            [
                'title' => 'Bank Branch Security & Biometric Access Control',
                'category' => 'Access Control & CCTV',
                'client' => 'Farooqabad Commercial Bank',
                'description' => 'Integrated biometric attendance & door access control system, motion sensors, panic alarm system, and 24/7 CCTV surveillance coverage.',
                'details' => 'Custom installation adhering to strict financial institution security regulations, emergency battery backups, and encrypted cloud event recording.',
                'image_path' => null
            ]
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(
                ['slug' => Str::slug($proj['title'])],
                $proj
            );
        }
    }
}
