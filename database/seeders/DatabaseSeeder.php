<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $products = Product::factory(50)->create();
        $users = User::factory(20)->create();

        $orders = Order::factory(10)->make()
                                    ->each(function($order) use ($users){
                                        $order->customer_id = $users->random()->id();
                                        $order ->save();
                    $payment = Payment::factory()->make();

                    $order->payment()->save($payment);
        });
    }
}
