<?php

use Illuminate\Database\Seeder;

class HistopatologiasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('histopatologias')->delete();
        
        \DB::table('histopatologias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'serial' => 1,
                'factura_id' => 113,
                'link_id' => 1,
                'topog' => 'C05.05',
                'mor1' => 'MD01',
                'mor2' => 'MD02',
                'firma_id' => 5,
                'firma2_id' => NULL,
                'diagnostico' => 'Dolor, augue et auctor tincidunt nascetur urna?',
                'muestra' => '2017-03-14',
                'fecha_informe' => '2017-03-14',
                'fecha_biopcia' => '2017-03-14',
                'fecha_muestra' => '2017-03-14',
                'informe' => '<p>Integer adipiscing ridiculus parturient, ultricies lorem lorem urna? Urna tincidunt amet porttitor placerat. Ut! Et adipiscing sit pellentesque, nec platea, porta natoque? Quis pulvinar urna natoque pellentesque porttitor tristique, mus et etiam, porta mauris amet amet sed nunc vut placerat! Cras nec! Augue hac phasellus sed quis elit! In eros, velit nec, scelerisque et mauris dapibus, integer a? Mauris, natoque mid lectus? Et adipiscing! Adipiscing in, cursus diam, lacus lectus tristique tortor, scelerisque odio nisi sit, elit turpis urna ac dapibus! Odio. Odio sagittis amet? Mus pid nec turpis proin, tincidunt, tincidunt? Mattis magnis mattis, adipiscing, lundium sit? Elementum, placerat pulvinar elit montes habitasse! Elit magna nunc, mus? Ridiculus augue sed nec eu porttitor, velit montes facilisis purus? Amet? Penatibus.</p>

<p>Placerat integer in elementum platea sit montes cursus amet! Diam duis lundium augue sit pid tortor tempor pellentesque pulvinar elementum, lectus sociis ac. In sed et duis etiam eu rhoncus amet quis, vel etiam porta odio turpis. Eu urna, nascetur urna placerat vel in. Ultricies et, mauris, ac, augue scelerisque, turpis amet dis lorem! Vel risus et turpis ut! Nunc? Egestas proin sed in porta aliquet lundium scelerisque parturient, etiam, placerat! Mid ac tristique mus! Lorem tincidunt? Ac placerat habitasse tincidunt! Integer tortor, rhoncus a nisi. Duis ac mauris, magna magna lundium lundium turpis lundium rhoncus augue a, nisi, augue sed adipiscing mus scelerisque integer, egestas ultrices? Eu nec, vut quis. Am</p>',
                'created_at' => '2017-03-14 22:39:39',
                'updated_at' => '2017-03-20 10:43:38',
            ),
            1 => 
            array (
                'id' => 2,
                'serial' => 2,
                'factura_id' => 132,
                'link_id' => 2,
                'topog' => 'C05.05',
                'mor1' => 'MD01',
                'mor2' => 'MD02',
                'firma_id' => 1,
                'firma2_id' => 5,
                'diagnostico' => 'Arcu odio nascetur ut lectus et tort',
                'muestra' => '2017-03-14',
                'fecha_informe' => '2017-03-14',
                'fecha_biopcia' => '2017-03-14',
                'fecha_muestra' => '2017-03-14',
                'informe' => '<p>Aliquet elementum ac, pellentesque arcu ultricies vut cursus? Tristique mid? Scelerisque amet! Risus dolor arcu amet, est enim eu nec proin rhoncus, cum ultricies cursus parturient montes odio, amet velit, ut porta arcu ut dis ultrices amet dapibus et placerat, augue turpis? Cras mid sit? Integer! Penatibus tristique montes et lorem. A! Ridiculus magna. Augue dictumst, nunc parturient! Eros nisi? Nascetur, arcu, rhoncus tincidunt, et dictumst nascetur tincidunt? Nec. Risus adipiscing parturient amet nec mid. Ut sociis ac. Porta scelerisque, augue ultricies aliquet auctor hac tempor pid porta? Cum porttitor tincidunt penatibus cum amet turpis odio dolor odio eros, enim penatibus ultricies? Nisi sit! Odio egestas a nisi, magna, odio, lundium egestas rhoncus quis! Tincidunt integer placerat. Sed, parturient dolor.</p>

<p>Natoque ultrices magna augue, vel, tincidunt hac, platea, porta scelerisque, quis, magna aliquet enim scelerisque in turpis natoque elementum nec tincidunt quis augue, nascetur pid proin elementum magna amet natoque mauris massa massa? Eu rhoncus cras sit, tempor auctor, dolor risus risus tincidunt lacus? Adipiscing integer integer, dis odio arcu dictumst enim porta ut habitasse. Pellentesque! Magna ridiculus elit! Vel dolor pellentesque, ultrices, enim et, et arcu scelerisque! Enim ac lorem, penatibus habitasse sagittis, massa velit rhoncus mauris hac aliquam cras magna elementum turpis velit nisi quis turpis, platea aenean est. Sociis! Natoque vut velit, natoque integer sociis scelerisque diam odio dis vut! Urna, auctor pulvinar nascetur risus urna pid eros dictumst tortor turpis dolor egestas ridiculus nec cras.</p>',
                'created_at' => '2017-03-14 23:08:58',
                'updated_at' => '2017-03-20 10:43:21',
            ),
        ));
        
        
    }
}