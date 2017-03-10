<?php

use Illuminate\Database\Seeder;

class CitologiasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('citologias')->delete();
        
        \DB::table('citologias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'factura_id' => 113,
                'serial' => 1,
                'deteccion_cancer' => 1,
                'indice_maduracion' => NULL,
                'otros_a' => 'asda sda',
                'gravidad_id' => 6,
                'fur' => '2017-02-15',
                'fup' => '2017-02-15',
                'fecha_informe' => '2017-02-15',
                'fecha_muestra' => '2017-02-15',
                'para' => 'adsas dasd asd',
                'abortos' => 2,
                'icitologia_id' => 6,
                'firma_id' => 11,
                'firma2_id' => 16,
                'otros_b' => 'Cualquier cosa',
                'mm' => 1,
                'diagnostico_clinico' => '<p>Duis cursus placerat cras nascetur mattis nunc aenean. Nunc ac auctor nunc, sagittis vel pulvinar mus! Porta ut, dignissim penatibus nisi! Pulvinar, ut nec proin augue rhoncus, a, porta ac cum turpis, amet diam lorem lacus rhoncus, sagittis lacus integer aenean tristique, dolor quis, mus mid adipiscing adipiscing, tempor rhoncus massa a, mattis elementum, pulvinar dis integer habitasse diam proin! Ridiculus adipiscing nisi mus urna non. Auctor pulvinar aliquam a dapibus hac sed porttitor sed ultricies amet. Arcu habitasse dolor, sit lorem! Risus ut natoque turpis sagittis! Cursus? Dignissim aliquet? Ut penatibus arcu? A scelerisque. Amet? Penatibus? Porta urna amet sed nunc cum vel? Lectus porttitor, scelerisque porttitor etiam elit tortor magna sed. Sed porttitor ac porttitor elementum est! Enim. Montes egestas ut. Habitasse rhoncus, vut porttitor dapibus, ac, natoque ac? Non sit massa aenean in tincidunt, magnis dis elit? Scelerisque dis mattis porta tincidunt adipiscing turpis et enim, dignissim sagittis! Amet placerat quis lorem! Pid amet turpis! Vel. Scelerisque lacus non nisi rhoncus ac diam vel pellentesque vut placerat, habitasse parturient enim rhoncus, ridiculus in vel nunc nascetur! Parturient pellentesque augue tristique lacus proin, natoque, enim vut egestas ac, lacus? Ultricies, sagittis hac nec, placerat sociis montes velit, massa montes duis magna, porta, ut dignissim tincidunt et non scelerisque nunc rhoncus turpis lacus, elementum. Dolor natoque sit ridiculus! Magna nascetur mauris penatibus tincidunt scelerisque pid augue, arcu eu! Lacus ut in mus, sed pellentesque porttitor odio, pulvinar natoque.</p>',
                'user_id' => 1,
                'created_at' => '2017-02-15 21:40:25',
                'updated_at' => '2017-02-27 18:04:47',
            ),
        ));
        
        
    }
}