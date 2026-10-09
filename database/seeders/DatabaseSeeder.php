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

        // 2. Seed Multi-Level Nested Categories Structure
        $structure = [
            'Laptops' => [
                'Dell Laptops' => ['Core i5 Dell Laptops', 'Core i7 Dell Laptops'],
                'HP Laptops' => ['Core i5 HP Laptops', 'Core i7 HP Laptops'],
                'Lenovo Laptops' => [],
                'ASUS Laptops' => [],
                'Apple MacBooks' => []
            ],
            'Cables' => [
                'HDMI Cables' => ['Original 4K Braided HDMI Cables', 'Standard HDMI Cables'],
                'Ethernet Cables' => ['CAT6 Copper Ethernet Cables', 'CAT5e Cables'],
                'Power Cables' => [],
                'VGA Cables' => []
            ],
            'Laptop Chargers' => [],
            'Storage Devices' => [
                'Solid State Drives (SSDs)' => ['NVMe M.2 SSDs', 'SATA SSDs'],
                'Hard Disk Drives (HDDs)' => ['Surveillance HDDs', 'Desktop HDDs']
            ],
            'USBs' => [
                'Kingston USBs' => ['Original Kingston USBs', 'Copy / A-Grade Kingston USBs'],
                'SanDisk USBs' => ['Original SanDisk USBs', 'Copy SanDisk USBs'],
                'Samsung USBs' => [],
                'HP USBs' => []
            ],
            'Speakers' => [],
            'Converters' => [
                'VGA to HDMI Converters' => [],
                'HDMI to VGA Converters' => []
            ],
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

            foreach ($children as $childName => $subChildren) {
                if (is_array($subChildren)) {
                    $child = Category::updateOrCreate(
                        ['slug' => Str::slug($childName)],
                        ['name' => $childName, 'parent_id' => $parent->id]
                    );
                    $categoryMap[$childName] = $child;

                    foreach ($subChildren as $subChildName) {
                        $subChild = Category::updateOrCreate(
                            ['slug' => Str::slug($subChildName)],
                            ['name' => $subChildName, 'parent_id' => $child->id]
                        );
                        $categoryMap[$subChildName] = $subChild;
                    }
                } else {
                    $child = Category::updateOrCreate(
                        ['slug' => Str::slug($subChildren)],
                        ['name' => $subChildren, 'parent_id' => $parent->id]
                    );
                    $categoryMap[$subChildren] = $child;
                }
            }
        }

        // 3. Seed Sample Products
        $products = [
            [
                'category' => 'Original Kingston USBs',
                'name' => 'Original Kingston DataTraveler Exodia 64GB USB 3.2',
                'description' => '100% Genuine Original Kingston USB flash drive with official distributor warranty card. High-speed USB 3.2 read/write performance.',
                'price' => 2200,
                'image_path' => null
            ],
            [
                'category' => 'Copy / A-Grade Kingston USBs',
                'name' => 'Kingston 64GB USB 3.0 (A-Grade Market Copy)',
                'description' => 'A-Grade copy flash drive for budget storage needs. Suitable for everyday document files, media storage, and student use.',
                'price' => 1250,
                'image_path' => null
            ],
            [
                'category' => 'Original 4K Braided HDMI Cables',
                'name' => 'Original Baseus 4K 60Hz Gold-Plated Braided HDMI 5m',
                'description' => 'Heavy duty braided nylon 5-meter HDMI cable supporting uncompressed 4K@60Hz video and high-end Dolby audio.',
                'price' => 2800,
                'image_path' => null
            ],
            [
                'category' => 'Standard HDMI Cables',
                'name' => 'Standard Black PVC HDMI Cable 1.5m',
                'description' => 'Standard Full HD 1080p male-to-male HDMI cable for desktop monitors, TV boxes, and projectors.',
                'price' => 450,
                'image_path' => null
            ],
            [
                'category' => 'Core i5 Dell Laptops',
                'name' => 'Dell Latitude 5420 Core i5 11th Gen',
                'description' => 'Business class lightweight laptop. Intel Core i5 11th Gen, 16GB RAM, 512GB NVMe SSD, 14" Full HD display, excellent battery health.',
                'price' => 135000,
                'image_path' => null
            ],
            [
                'category' => 'Core i7 HP Laptops',
                'name' => 'HP EliteBook 840 G8 Core i7 11th Gen',
                'description' => 'Premium aluminum business notebook. Intel Core i7 11th Gen, 16GB DDR4 RAM, 1TB NVMe SSD, Backlit keyboard, Fingerprint sensor.',
                'price' => 165000,
                'image_path' => null
            ],
            [
                'category' => 'CAT6 Copper Ethernet Cables',
                'name' => 'CAT6 High-Speed Copper Ethernet Cable Roll (305m)',
                'description' => 'Full roll of 305 meters pure copper CAT6 networking cable for CCTV installations and gigabit commercial networking.',
                'price' => 18500,
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
