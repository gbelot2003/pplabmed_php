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
        

        \DB::table('Citologias')->delete();
        
        \DB::table('Citologias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'serial' => 1,
                'factura_id' => 113,
                'deteccion_cancer' => 0,
                'indice_maduracion' => 1,
                'otros_a' => 'asda sda',
                'gravidad' => 6,
                'fur' => '2017-02-15',
                'fup' => '2017-02-15',
                'fecha_informe' => '2017-02-15',
                'fecha_muestra' => '2017-02-15',
                'para' => 0,
                'abortos' => 0,
                'icitologia_id' => 1,
                'firma_id' => 2,
                'firma2_id' => 3,
                'otros_b' => 'Cualquier cosa',
                'mm' => 1,
                'diagnostico' => '<p>Duis cursus placerat cras nascetur mattis nunc aenean. Nunc ac auctor nunc, sagittis vel pulvinar mus! Porta ut, dignissim penatibus nisi! Pulvinar, ut nec proin augue rhoncus, a, porta ac cum turpis, amet diam lorem lacus rhoncus, sagittis lacus integer aenean tristique, dolor quis, mus mid adipiscing adipiscing, tempor rhoncus massa a, mattis elementum, pulvinar dis integer habitasse diam proin! Ridiculus adipiscing nisi mus urna non. Auctor pulvinar aliquam a dapibus hac sed porttitor sed ultricies amet. Arcu habitasse dolor, sit lorem! Risus ut natoque turpis sagittis! Cursus? Dignissim aliquet? Ut penatibus arcu? A scelerisque. Amet? Penatibus? Porta urna amet sed nunc cum vel? Lectus porttitor, scelerisque porttitor etiam elit tortor magna sed. Sed porttitor ac porttitor elementum est! Enim. Montes egestas ut. Habitasse rhoncus, vut porttitor dapibus, ac, natoque ac? Non sit massa aenean in tincidunt, magnis dis elit? Scelerisque dis mattis porta tincidunt adipiscing turpis et enim, dignissim sagittis! Amet placerat quis lorem! Pid amet turpis! Vel. Scelerisque lacus non nisi rhoncus ac diam vel pellentesque vut placerat, habitasse parturient enim rhoncus, ridiculus in vel nunc nascetur! Parturient pellentesque augue tristique lacus proin, natoque, enim vut egestas ac, lacus? Ultricies, sagittis hac nec, placerat sociis montes velit, massa montes duis magna, porta, ut dignissim tincidunt et non scelerisque nunc rhoncus turpis lacus, elementum. Dolor natoque sit ridiculus! Magna nascetur mauris penatibus tincidunt scelerisque pid augue, arcu eu! Lacus ut in mus, sed pellentesque porttitor odio, pulvinar natoque.</p>',
                'informe' => ' auctor nunc, sagittis vel pulvinar mus! Porta ut, dignissim penatibus nisi',
                'user_id' => 1,
                'created_at' => '2017-03-09 14:52:21',
                'updated_at' => '2017-03-14 16:40:22',
            ),
            1 => 
            array (
                'id' => 2,
                'serial' => 2,
                'factura_id' => 177,
                'deteccion_cancer' => NULL,
                'indice_maduracion' => NULL,
                'otros_a' => NULL,
                'gravidad' => 2,
                'fur' => '2017-03-10',
                'fup' => '2017-03-10',
                'fecha_informe' => '2017-03-10',
                'fecha_muestra' => '2017-03-10',
                'para' => 0,
                'abortos' => 0,
                'icitologia_id' => 2,
                'firma_id' => 1,
                'firma2_id' => NULL,
                'otros_b' => NULL,
                'mm' => 0,
                'diagnostico' => '<p>asd asdas&nbsp;</p>',
                'informe' => '<p>asd asdas&nbsp;</p>',
                'user_id' => NULL,
                'created_at' => '2017-03-09 14:52:21',
                'updated_at' => '2017-03-14 16:33:51',
            ),
            2 => 
            array (
                'id' => 3,
                'serial' => 3,
                'factura_id' => 110,
                'deteccion_cancer' => 1,
                'indice_maduracion' => 0,
                'otros_a' => NULL,
                'gravidad' => 1,
                'fur' => '2017-03-10',
                'fup' => '2017-03-10',
                'fecha_informe' => '2017-03-10',
                'fecha_muestra' => '2017-03-10',
                'para' => 0,
                'abortos' => 0,
                'icitologia_id' => 4,
                'firma_id' => 2,
                'firma2_id' => NULL,
                'otros_b' => NULL,
                'mm' => 1,
                'diagnostico' => '<p>Casasd asdasdas dasd asd asda s</p>',
                'informe' => '<p>Casasd asdasdas dasd asd asda s</p>',
                'user_id' => NULL,
                'created_at' => '2017-03-09 21:43:53',
                'updated_at' => '2017-03-20 11:00:16',
            ),
            3 => 
            array (
                'id' => 4,
                'serial' => 5,
                'factura_id' => 151,
                'deteccion_cancer' => NULL,
                'indice_maduracion' => 1,
                'otros_a' => NULL,
                'gravidad' => 8,
                'fur' => '2017-03-10',
                'fup' => '2017-03-10',
                'fecha_informe' => '2017-03-10',
                'fecha_muestra' => '2017-03-10',
                'para' => NULL,
                'abortos' => NULL,
                'icitologia_id' => 1,
                'firma_id' => 1,
                'firma2_id' => NULL,
                'otros_b' => NULL,
                'mm' => 1,
                'diagnostico' => '<p>sadsasdasdasd &nbsp;asda sda s asdas das asaasdas asda sdas dasda&nbsp;</p>',
                'informe' => '<p>sadsasdasdasd &nbsp;asda sda s asdas das asaasdas asda sdas dasda&nbsp;</p>',
                'user_id' => NULL,
                'created_at' => '2017-03-10 21:45:46',
                'updated_at' => '2017-03-14 16:33:21',
            ),
            4 => 
            array (
                'id' => 5,
                'serial' => 6,
                'factura_id' => 156,
                'deteccion_cancer' => NULL,
                'indice_maduracion' => 1,
                'otros_a' => NULL,
                'gravidad' => 9,
                'fur' => '2017-03-10',
                'fup' => '2017-03-10',
                'fecha_informe' => '2017-03-10',
                'fecha_muestra' => '2017-03-10',
                'para' => NULL,
                'abortos' => NULL,
                'icitologia_id' => 2,
                'firma_id' => 4,
                'firma2_id' => NULL,
                'otros_b' => 'sdasd asda sd',
                'mm' => 0,
                'diagnostico' => '<p>sdfs dfsd fsdfsdf sdf sdfs dfs dfsd sd sdf sdfs dfsdfsd fdfdfdf dfdfdfsdfsdf sdfs dfsdfsdfsd</p>',
                'informe' => '<p>sdfs dfsd fsdfsdf sdf sdfs dfs dfsd sd sdf sdfs dfsdfsd fdfdfdf dfdfdfsdfsdf sdfs dfsdfsdfsd</p>',
                'user_id' => NULL,
                'created_at' => '2017-03-10 21:46:47',
                'updated_at' => '2017-03-14 16:33:11',
            ),
            5 => 
            array (
                'id' => 6,
                'serial' => 7,
                'factura_id' => 159,
                'deteccion_cancer' => 1,
                'indice_maduracion' => 1,
                'otros_a' => NULL,
                'gravidad' => 2,
                'fur' => '2017-03-11',
                'fup' => '2017-03-11',
                'fecha_informe' => '2017-03-11',
                'fecha_muestra' => '2017-03-11',
                'para' => NULL,
                'abortos' => NULL,
                'icitologia_id' => 3,
                'firma_id' => 5,
                'firma2_id' => NULL,
                'otros_b' => 'asdasdasd',
                'mm' => 0,
                'diagnostico' => '<p>asdasdasd asdas as asd asda sdasd asdasd asda sdas das dasd asdas&nbsp;</p>',
                'informe' => '<p>asdasdasd asdas as asd asda sdasd asdasd asda sdas das dasd asdas&nbsp;</p>',
                'user_id' => NULL,
                'created_at' => '2017-03-10 21:47:49',
                'updated_at' => '2017-03-16 16:29:55',
            ),
            6 => 
            array (
                'id' => 7,
                'serial' => 8,
                'factura_id' => 196,
                'deteccion_cancer' => 0,
                'indice_maduracion' => 0,
                'otros_a' => NULL,
                'gravidad' => 3,
                'fur' => '2017-03-10',
                'fup' => '2017-03-10',
                'fecha_informe' => '2017-03-10',
                'fecha_muestra' => '2017-03-10',
                'para' => NULL,
                'abortos' => NULL,
                'icitologia_id' => 4,
                'firma_id' => 2,
                'firma2_id' => NULL,
                'otros_b' => NULL,
                'mm' => 1,
                'diagnostico' => '<p>sasa sdas das as dasda sdas as asdasdasasdas as asd asdas das&nbsp;</p>',
                'informe' => '<p>sasa sdas das as dasda sdas as asdasdasasdas as asd asdas das&nbsp;</p>',
                'user_id' => NULL,
                'created_at' => '2017-03-11 21:48:30',
                'updated_at' => '2017-03-16 16:36:21',
            ),
        ));
        
        
    }
}