<?php

namespace Database\Seeders;

use App\Models\Concert;
use Illuminate\Database\Seeder;

class ConcertSeeder extends Seeder
{
    public function run()
    {
        $concerts = [
            [
                'title' => 'Buzz World Tour — Jakarta',
                'venue' => 'Istora Senayan',
                'date' => '2025-11-14 19:00:00',
                'city' => 'Jakarta',
                'country' => 'Indonesia',
                'ticket_url' => 'https://example.com/tickets/jakarta',
                'image' => 'concerts/KonserNIKIJakarta.jpg',
                'description' => 'NIKI returns to Jakarta for an unforgettable night of music from her latest album Buzz and classic hits.',
                'status' => 'upcoming',
                'ticket_price' => 750000,
                'capacity' => 5000,
                'available_tickets' => 3500,
                'is_featured' => true
            ],
            [
                'title' => 'Buzz World Tour — London',
                'venue' => 'O2 Forum',
                'date' => '2025-12-02 20:00:00',
                'city' => 'London',
                'country' => 'United Kingdom',
                'ticket_url' => 'https://example.com/tickets/london',
                'image' => 'concerts/KonserNIKILondon.jpg',
                'description' => 'Experience NIKI\'s mesmerizing performance in the heart of London with special guest appearances.',
                'status' => 'upcoming',
                'ticket_price' => 650000,
                'capacity' => 3000,
                'available_tickets' => 1500,
                'is_featured' => true
            ],
            [
                'title' => 'Buzz World Tour — Los Angeles',
                'venue' => 'The Wiltern',
                'date' => '2026-01-20 19:30:00',
                'city' => 'Los Angeles',
                'country' => 'United States',
                'ticket_url' => 'https://example.com/tickets/la',
                'image' => 'concerts/KonserNIKILosAngeles.jpg',
                'description' => 'NIKI brings the Buzz World Tour to Los Angeles for a night of emotional ballads and energetic performances.',
                'status' => 'upcoming',
                'ticket_price' => 800000,
                'capacity' => 4000,
                'available_tickets' => 2000,
                'is_featured' => true
            ],
            [
                'title' => 'Nicole World Tour — Singapore',
                'venue' => 'The Star Theatre',
                'date' => '2023-08-15 20:00:00',
                'city' => 'Singapore',
                'country' => 'Singapore',
                'ticket_url' => null,
                'image' => 'concerts/singapore.jpg',
                'description' => 'Past performance from the Nicole World Tour featuring songs from the acclaimed album.',
                'status' => 'completed',
                'ticket_price' => 600000,
                'capacity' => 3500,
                'available_tickets' => 0,
                'is_featured' => false
            ]
        ];

        foreach ($concerts as $concert) {
            Concert::create($concert);
        }
    }
}