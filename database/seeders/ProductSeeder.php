<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $category = Category::where('name', 'Apparel')->first();
        
        $products = [
            [
                'name' => 'Lucky Crewneck (Hand-drawn by NIKI)',
                'description' => 'Hand-drawn and designed by Niki of her dog, Lucy.',
                'price' => 580000,
                'category_id' => $category->id,
                'image' => 'LuckyCrewneck.jpg',
                'badge' => 'LIMITED',
                'full_description' => 'Step into a world where music meets design with the Lucky Crewneck, a truly one-of-a-kind piece hand-drawn by NIKI herself. Created for fans who carry artistry and passion in their everyday style, this crewneck is more than apparel—it\'s a statement.',
                'features' => 'Premium cotton blend, Hand-drawn design, Limited edition, Unisex fit',
                'stock' => 50,
                'is_featured' => true,
                'sku' => 'NKI-LUCKY-001'
            ],
            [
                'name' => 'Nicole Lyric Tee',
                'description' => 'Official NICOLE tee featuring handwritten lyrics by Niki.',
                'price' => 650000,
                'category_id' => $category->id,
                'image' => 'NicoleLyricTee.jpg',
                'badge' => 'NEW',
                'full_description' => 'Step into style with the Nicole Lyric Tee — a piece of wearable music history from NIKI. This tee features handwritten lyrics by NIKI herself. It\'s not just a t-shirt; it\'s a connection to the artist\'s story and your fandom.',
                'features' => '100% cotton, Handwritten lyrics, Premium print, Regular fit',
                'stock' => 100,
                'is_featured' => true,
                'sku' => 'NKI-NICOLE-002'
            ],
            [
                'name' => 'Niki 2023 Black Tour Hoodie',
                'description' => 'As seen on 2023 NIKI tour (NIKI wore this)',
                'price' => 485000,
                'category_id' => $category->id,
                'image' => 'Niki2023BlackTourHoodie.jpg',
                'badge' => 'TOUR',
                'full_description' => 'Celebrate an unforgettable chapter in NIKI\'s journey with the NIKI 2023 Black Tour Hoodie — a premium piece of tour memorabilia, built for fans who want more than just merch.',
                'features' => 'Heavyweight fleece, Tour dates print, Ribbed cuffs, Premium embroidery',
                'stock' => 75,
                'is_featured' => false,
                'sku' => 'NKI-TOUR-003'
            ],
            [
                'name' => 'Niki Ringer Tee',
                'description' => 'Unisex Ringer Tee with Niki\'s handwritten signature',
                'price' => 420000,
                'category_id' => $category->id,
                'image' => 'NikiRingerTee.jpg',
                'badge' => 'FAVORITE',
                'full_description' => 'This isn\'t just another tee. With the "Ringer Tee (Handwritten Signature)", NIKI brings her personal touch directly to you.',
                'features' => 'Ringer style, Signature print, Vintage wash, Comfort fit',
                'stock' => 60,
                'is_featured' => true,
                'sku' => 'NKI-RINGER-004'
            ],
            [
                'name' => 'Niki 2023 Music Note Hoodie',
                'description' => 'As seen on 2023 NIKI tour',
                'price' => 485000,
                'category_id' => $category->id,
                'image' => 'Niki2023MusicNoteHoodie.jpg',
                'badge' => null,
                'full_description' => 'Dive into the rhythm of style with the 2023 Music Note Hoodie from NIKI. Crafted for fans who live and breathe music.',
                'features' => 'Music note design, Premium fleece, Ribbed hem, Front pocket',
                'stock' => 45,
                'is_featured' => false,
                'sku' => 'NKI-MUSIC-005'
            ],
            [
                'name' => 'Niki Maui Tee',
                'description' => 'Official Nicole Merchandise',
                'price' => 405000,
                'category_id' => $category->id,
                'image' => 'NikiMauiTee.jpg',
                'badge' => 'CHARITY',
                'full_description' => 'Show your support and wear the cause with the NIKI Maui Charity Tee — a meaningful piece by NIKI created to raise awareness and funds for the recovery in Maui.',
                'features' => 'Charity item, Soft cotton, Maui strong design, Regular fit',
                'stock' => 80,
                'is_featured' => true,
                'sku' => 'NKI-MAUI-006'
            ],
            [
                'name' => 'Sand Nicole Long Sleeve',
                'description' => 'Official 2022 Nicole Long Sleeve.',
                'price' => 750000,
                'category_id' => $category->id,
                'image' => 'SandNicoleLongSleeve.jpg',
                'badge' => 'LIMITED',
                'full_description' => 'Add a versatile layer to your wardrobe with the Sand Nicole Long Sleeve — part of NIKI\'s official "Nicole" drop.',
                'features' => 'Long sleeve, Sand color, Premium cotton, Ribbed collar',
                'stock' => 30,
                'is_featured' => false,
                'sku' => 'NKI-SAND-007'
            ],
            [
                'name' => 'MOONCHILD Vinyl',
                'description' => 'OFFICIAL MOONCHILD VINYL',
                'price' => 380000,
                'category_id' => Category::where('name', 'Music')->first()->id,
                'image' => 'MOONCHILDVinyl.jpg',
                'badge' => 'LIMITED TO 4 PER ORDER',
                'full_description' => 'Own a piece of music history with this vinyl edition of NIKI\'s debut studio album MOONCHILD, pressed as a beautiful collector\'s item.',
                'features' => 'Limited edition, Silver opaque vinyl, Gatefold sleeve, Digital download included',
                'stock' => 25,
                'is_featured' => true,
                'sku' => 'NKI-VINYL-008'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}