<?php

namespace Database\Seeders;

use App\Models\anniversaryDealer;
use App\Models\dealer;
use App\Models\groupDealer;
use App\Models\groupDetailDealer;
use App\Models\noteDealer;
use App\Models\Order;
use App\Models\otherContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealerSeeder extends Seeder
{
    /**
     * Seed tất cả các bảng liên quan đến dealer tại đây
     */
    public function run(): void
    {   // Seed bảng dealer và anniversaryDealer và noteDealer
        $groups = groupDealer::factory()->count(5)->create();
        //----------------------------------------------------------------
        foreach ($groups as $key => $group) {
            dealer::factory()
                ->count(3)
                ->has(anniversaryDealer::factory()->count(2)->sequence(['name' => 'Liên hoan'], ['name' => 'Ngày thành lập']))
                ->has(noteDealer::factory()->count(1), 'noteDealer')
                ->has(otherContact::factory()->count(1), 'otherContact')
                ->has(Order::factory()->count(3)->sequence(['unit' => 'bottle'], ['unit' => 'package'], ['unit' => 'box']), 'Order')
                ->has(groupDetailDealer::factory()
                    ->for(
                        $group,
                        'groupDealer'
                    ), 'groupDetailDealer')
                ->create();
        }
    }
}
