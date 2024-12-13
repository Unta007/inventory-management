<?php

namespace Database\Factories;

use App\Models\Beverage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeverageFactory extends Factory
{
    protected $model = Beverage::class;

    public function definition()
    {
        $coffeeShopItems = [
            'Espresso',
            'Cappuccino',
            'Latte',
            'Mocha',
            'Americano',
            'Macchiato',
            'Cortado',
            'Flat White',
            'Breve',
            'Iced Coffee',
            'Cold Brew',
            'Tea',
            'Hot Chocolate',
            'Milkshake',
            'Frappuccino',
            'Smoothie',
            'Juice',
            'Soda',
            'Water',
            'Bottled Water',
        ];

        return [
            'item_name' => $this->faker->randomElement($coffeeShopItems),
            'current_quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
