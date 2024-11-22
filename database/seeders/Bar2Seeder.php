<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Bar2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $bares = array(
            array(
                "nombre" => "Taberna El Sur (Córdoba)",
                "descripcion" => "Situada en el corazón de Córdoba, esta taberna es famosa por sus deliciosas tapas de salmorejo, flamenquines y rabo de toro. El ambiente rústico y acogedor te hará sentir como en casa."
            ),
            array(
                "nombre" => "La Cuchara de San Telmo (San Sebastián)",
                "descripcion" => "Ubicado en el Casco Antiguo de San Sebastián, este bar es conocido por sus exquisitos pintxos y su ambiente animado. Sus tapas creativas y sabrosas son ideales para degustar la cocina vasca tradicional."
            )
        );


        foreach ($bares as $bar) {
            DB::table('bars')->insert ([
                'name' => $bar['nombre'],
                'description' => $bar['descripcion']
            ]);

        }
    }
}

