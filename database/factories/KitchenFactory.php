<?php

namespace Database\Factories;

use App\Models\Kitchen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kitchen>
 */
class KitchenFactory extends Factory
{
    protected $model = Kitchen::class;

    public function definition()
    {
        $KitchenItems = [
            'Knife',
            'Cutting Board',
            'Frying Pan',
            'Saucepan',
            'Stock Pot',
            'Baking Sheet',
            'Mixing Bowl',
            'Measuring Cups',
            'Measuring Spoons',
            'Whisk',
            'Spatula',
            'Tongs',
            'Peeler',
            'Grater',
            'Colander',
            'Can Opener',
            'Blender',
            'Food Processor',
            'Microwave',
            'Toaster',
            'Coffee Maker',
            'Slow Cooker',
            'Pressure Cooker',
            'Rice Cooker',
            'Dishwasher',
            'Oven Mitts',
            'Apron',
            'Cutlery Set',
            'Glassware',
            'Dinner Plates',
            'Serving Bowls',
            'Storage Containers',
            'Spice Rack',
            'Salt and Pepper Shakers',
            'Cookbook',
            'Kitchen Timer',
            'Thermometer',
            'Baking Pan',
            'Rolling Pin',
        ];

        return [
            'item_name' => $this->faker->randomElement($KitchenItems),
            'current_quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
