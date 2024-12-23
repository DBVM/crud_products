<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Image;
use App\Models\Cart;
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
       

        $users = User::factory(20)
            ->create()
            ->each(function ($user) {
                $image = Image::factory()
                    ->user()
                    ->make();
                $user->image()->save($image);
            });


        $orders = Order::factory(10)
            ->make()
            ->each(function ($order) use ($users) {
                $order->customer_id = $users->random()->id;
                $order->save();
                $payment = Payment::factory()->make();

                $order->payment()->save($payment);
            });

        $carts = Cart::factory()->create(20);

        $products = Product::factory(50)
                    ->create()
                    ->each(function($product) use ($orders,$carts){
                        $order = $orders->random();
                        
                        $order ->products()->attach([
                            $product->id=>['quantity' => mt_rand(1,3)]
                        ]);

                        $cart = $carts ->random();

                        $cart ->products()->attach([
                            $product->id=>['quantity' => mt_rand(1,3)]
                        ]);

                        $images  = Image::factory(mt_rand(2,4))->make();

                        $product->images()->saveMany($images);
                        
                    });
    }
}
