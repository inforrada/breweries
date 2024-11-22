<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $vinos = array(
            array(
                "nombre" => "Viña Ardanza Reserva",
                "descripcion" => "Vino tinto con gran expresión frutal y toques de vainilla. Elegante y equilibrado.",
                "bodega" => "La Rioja Alta",
                "precio_aprox" => 25.99,
                "grados_alcohol" => 14
            ),
            array(
                "nombre" => "Albariño Martin Codax",
                "descripcion" => "Vino blanco fresco y afrutado, con notas cítricas y minerales.",
                "bodega" => "Bodegas Martín Códax",
                "precio_aprox" => 15.75,
                "grados_alcohol" => 13
            ),
            array(
                "nombre" => "Pesquera Crianza",
                "descripcion" => "Vino tinto con intensos aromas a frutas maduras y toques de madera. Estructurado y sedoso.",
                "bodega" => "Bodegas Alejandro Fernández",
                "precio_aprox" => 20.50,
                "grados_alcohol" => 13.5
            ),
            array(
                "nombre" => "Cava Freixenet Brut Nature",
                "descripcion" => "Cava espumoso seco con notas de manzana verde y tostados. Burbujas finas y elegantes.",
                "bodega" => "Freixenet",
                "precio_aprox" => 12.95,
                "grados_alcohol" => 11.5
            ),
            array(
                "nombre" => "Pruno",
                "descripcion" => "Vino tinto con intensos aromas a frutos negros y especias. Potente y sabroso.",
                "bodega" => "Finca Villacreces",
                "precio_aprox" => 18.75,
                "grados_alcohol" => 14
            ),
            array(
                "nombre" => "Marqués de Riscal Verdejo",
                "descripcion" => "Vino blanco seco con notas herbáceas y cítricas. Fresco y vivaz.",
                "bodega" => "Marqués de Riscal",
                "precio_aprox" => 11.20,
                "grados_alcohol" => 13
            ),
            array(
                "nombre" => "La Miranda de Secastilla",
                "descripcion" => "Vino tinto con aromas a frutos rojos y toques florales. Elegante y seductor.",
                "bodega" => "Viñas del Vero",
                "precio_aprox" => 22.80,
                "grados_alcohol" => 13.5
            ),
            array(
                "nombre" => "Muga Rosado",
                "descripcion" => "Vino rosado con notas a frutos rojos y flores. Fresco y equilibrado.",
                "bodega" => "Bodegas Muga",
                "precio_aprox" => 13.50,
                "grados_alcohol" => 13
            ),
            array(
                "nombre" => "Pago de Carraovejas Reserva",
                "descripcion" => "Vino tinto con intensos aromas a frutas maduras y toques especiados. Estructurado y elegante.",
                "bodega" => "Pago de Carraovejas",
                "precio_aprox" => 35.60,
                "grados_alcohol" => 14.5
            ),
            array(
                "nombre" => "Cava Gramona Imperial",
                "descripcion" => "Cava espumoso con complejas notas de frutos secos y pan tostado. Elegante y persistente.",
                "bodega" => "Celler Batlle",
                "precio_aprox" => 27.90,
                "grados_alcohol" => 12
            )
        );
        
        foreach ($vinos as $vino) {
            DB::table('wines')->insert([
                'name' => $vino['nombre'],
                'description' => $vino['descripcion'],
                'winery' => $vino['bodega'],
                'price' => $vino['precio_aprox'],
                'vol' => $vino['grados_alcohol']
            ]);
        }
    }
}
