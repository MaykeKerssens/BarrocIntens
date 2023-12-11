<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Barroc Intens Italian Light',
            'description' => 'Een koffiezetapparaat voor dagelijks gebruik.',
            'image_path' => 'storage/images/machine-bit-light.png',
            'price' => 499,
            'product_category_id' => 1,
        ]);
        Product::create([
            'name' => 'Barroc Intens Italian',
            'description' => 'Een krachtige koffiezetapparaat.',
            'price' => 599,
            'product_category_id' => 2,
        ]);
        Product::create([
            'name' => 'Barroc Intens Italian Deluxe',
            'description' => 'Een koffiezetapparaat voor dagelijks gebruik.',
            'image_path' => 'storage/images/machine-bit-deluxe.png',
            'price' => 799,
            'product_category_id' => 3,
        ]);
        Product::create([
            'name' => 'Barroc Intens Italian Deluxe Special',
            'description' => 'Een krachtige koffiezetapparaat.',
            'price' => 999,
            'product_category_id' => 4,
        ]);
        Product::create([
            'name' => 'Espresso Beneficio',
            'description' => 'Een toegankelijke en zachte koffie. Hij is afkomstig van de Finca El Limoncillo, een weelderige plantage aan de rand van het regenwoud in de Matagalpa regio in Nicaragua.',
            'price' => 21.60,
            'product_category_id' => 5,
        ]);
        Product::create([
            'name' => 'Yellow Bourbon Brasil',
            'description' => 'Koffie van de oorspronkelijke koffiestruik (de Bourbon) met gele koffiebessen. Deze zeldzame koffie heeft de afgelopen 20 jaar steeds meer erkenning gekregen en vele prijzen gewonnen.',
            'price' => 23.20,
            'product_category_id' => 5,
        ]);
        Product::create([
            'name' => 'Espresso Roma',
            'description' => 'Een Italiaanse espresso met een krachtig karakter en een aromatische afdronk.',
            'price' => 20.80,
            'product_category_id' => 5,
        ]);
        Product::create([
            'name' => 'Red Honey Honduras',
            'description' => 'De koffie is geproduceerd volgens de honey-methode. Hierbij wordt de koffieboon in haar vruchtvlees gedroogd, waardoor de zoete fruitsmaak diep in de boon trekt. Dit levert een éxtra zoete koffie op.',
            'price' => 27.80,
            'product_category_id' => 5,
        ]);
    }
}

