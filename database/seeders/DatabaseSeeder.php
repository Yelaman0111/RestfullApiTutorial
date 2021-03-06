<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\MOdels\Transaction;
use App\MOdels\User;

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

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // User::factory($userQuantity)->create();
        // User::truncate();
        // Category::truncate();
        // Product::truncate();
        // Transaction::truncate();

        DB::table('category_product')->truncate();

        $userQuantity = 1000;
        $categoriesQuantity = 30;
        $productQuantity = 1000;
        $transactionQuantity = 1000;

        // factory(User::class, $userQuantity)->create();
        \App\Models\User::factory($userQuantity)->create();
        // factory(User::class, $userQuantity)->create();
        \App\Models\Category::factory($categoriesQuantity)->create();
        \App\Models\Product::factory($transactionQuantity)->create()->each(
            function ($product) {
                $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');

                $product->categories()->attach($categories);
            }
        );
        \App\Models\Transaction::factory($productQuantity)->create();
    }
}