<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $bares = array(
            array(
                "nombre" => "Bar La Plata (Sevilla)",
                "descripcion" => "Este icónico bar en Sevilla es famoso por sus tapas de pescado fresco. Fundado en 1945, todavía se mantiene fiel a sus tradiciones y ofrece un ambiente auténtico andaluz para disfrutar de la cocina local."
            ),
            array(
                "nombre" => "El Tigre (Madrid)",
                "descripcion" => "Situado en el corazón de Madrid, El Tigre es conocido por sus generosas raciones de tapas, que acompañan cada bebida. Es un lugar animado y bullicioso, perfecto para socializar con amigos mientras se disfruta de la deliciosa comida."
            ),
            array(
                "nombre" => "Bodega La Puntual (Barcelona)",
                "descripcion" => "Esta bodega tradicional catalana ofrece una selección de vinos y cavas de calidad, acompañados de tapas típicas de la región. Su ambiente acogedor y su decoración rústica te transportarán a la esencia de la cultura catalana."
            ),
            array(
                "nombre" => "Bar Alfalfa (Sevilla)",
                "descripcion" => "Ubicado en el barrio de La Alfalfa, este bar es conocido por su auténtica cocina sevillana y ambiente vibrante. Sus tapas tradicionales, como la tortilla española y el salmorejo, son especialmente populares entre los locales y turistas."
            ),
            array(
                "nombre" => "Cervecería Catalana (Barcelona)",
                "descripcion" => "Una cervecería emblemática en Barcelona, famosa por sus pinchos y tapas variadas y creativas. Su amplio menú ofrece una selección única de sabores, desde opciones clásicas hasta opciones más modernas."
            ),
            array(
                "nombre" => "Bar EME (Granada)",
                "descripcion" => "Situado en el centro histórico de Granada, este bar es famoso por su tapa gratuita con cada bebida. El EME ofrece una variedad de tapas tradicionales andaluzas y es conocido por su amable servicio."
            ),
            array(
                "nombre" => "Bar Txepetxa (San Sebastián)",
                "descripcion" => "Especializado en anchoas, este bar en San Sebastián es un lugar imprescindible para los amantes del marisco. Sus pintxos de anchoa con diferentes acompañamientos son una delicia para el paladar."
            ),
            array(
                "nombre" => "Bodegas Ricla (Logroño)",
                "descripcion" => "Ubicada en la famosa Calle Laurel de Logroño, esta bodega es un lugar emblemático para degustar el famoso vino de La Rioja y disfrutar de deliciosas tapas tradicionales de la región."
            ),
            array(
                "nombre" => "Casa Labra (Madrid)",
                "descripcion" => "Fundada en 1860, esta histórica taberna es famosa por sus croquetas y sus pinchos de bacalao rebozado. Es un lugar lleno de historia y sabor, perfecto para sumergirse en la tradición madrileña."
            ),
            array(
                "nombre" => "Bar Vicente (Valencia)",
                "descripcion" => "Especializado en auténtica paella valenciana, este bar es un destino ideal para probar uno de los platos más emblemáticos de la cocina española. Su ambiente cálido y acogedor te hará sentir como en casa."
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
