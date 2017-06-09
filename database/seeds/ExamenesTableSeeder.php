<?php

use Illuminate\Database\Seeder;

class ExamenesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('examenes')->delete();
        
        \DB::table('examenes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'num_factura' => 5005946,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-05-20 10:03:36',
                'updated_at' => '2017-05-20 10:03:36',
            ),
            1 => 
            array (
                'id' => 2,
                'num_factura' => 5005945,
                'item' => 10328,
            'nombre_examen' => 'Cit. Genital (Base Liquida) Recibida En El Lab.',
                'created_at' => '2017-05-20 10:03:43',
                'updated_at' => '2017-05-20 10:03:43',
            ),
            2 => 
            array (
                'id' => 3,
                'num_factura' => 5005944,
                'item' => 10326,
                'nombre_examen' => 'Cit. Genital  Recibida En El Lab.',
                'created_at' => '2017-05-20 10:04:30',
                'updated_at' => '2017-05-20 10:04:30',
            ),
            3 => 
            array (
                'id' => 4,
                'num_factura' => 5005947,
                'item' => 10239,
            'nombre_examen' => 'Pieza De Cirugia Radical (Diseccion Radical Del Cuello)',
                'created_at' => '2017-05-20 10:55:11',
                'updated_at' => '2017-05-20 10:55:11',
            ),
            4 => 
            array (
                'id' => 5,
                'num_factura' => 5005949,
                'item' => 10271,
                'nombre_examen' => 'Marcador Tumoral  En Biopsia - Bcl-6',
                'created_at' => '2017-05-20 10:55:51',
                'updated_at' => '2017-05-20 10:55:51',
            ),
            5 => 
            array (
                'id' => 6,
                'num_factura' => 5005950,
                'item' => 10329,
                'nombre_examen' => 'Citologia De Cepillado, Lavado Y Biopsia Bronquial',
                'created_at' => '2017-05-20 10:56:08',
                'updated_at' => '2017-05-20 10:56:08',
            ),
            6 => 
            array (
                'id' => 7,
                'num_factura' => 5005948,
                'item' => 10326,
                'nombre_examen' => 'Cit. Genital  Recibida En El Lab.',
                'created_at' => '2017-05-20 10:56:21',
                'updated_at' => '2017-05-20 10:56:21',
            ),
            7 => 
            array (
                'id' => 8,
                'num_factura' => 5005951,
                'item' => 11471,
                'nombre_examen' => 'Marcador Tumoral En Biopsia - CA 19-9',
                'created_at' => '2017-05-20 10:57:55',
                'updated_at' => '2017-05-20 10:57:55',
            ),
            8 => 
            array (
                'id' => 9,
                'num_factura' => 5005951,
                'item' => 10315,
            'nombre_examen' => 'Marcador Tumoral En Biopsia- Mart(Melanin A)',
                'created_at' => '2017-05-20 10:57:55',
                'updated_at' => '2017-05-20 10:57:55',
            ),
            9 => 
            array (
                'id' => 10,
                'num_factura' => 5005952,
                'item' => 10333,
            'nombre_examen' => 'Citomegalovirus En Orina (Examen Citologico)',
                'created_at' => '2017-05-20 10:58:36',
                'updated_at' => '2017-05-20 10:58:36',
            ),
            10 => 
            array (
                'id' => 11,
                'num_factura' => 5005953,
                'item' => 10336,
            'nombre_examen' => 'Test De Tzanck (Celulas Herpeticas De Ampollas)',
                'created_at' => '2017-05-20 11:00:58',
                'updated_at' => '2017-05-20 11:00:58',
            ),
            11 => 
            array (
                'id' => 12,
                'num_factura' => 5005953,
                'item' => 10255,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Zielh-N',
                'created_at' => '2017-05-20 11:00:58',
                'updated_at' => '2017-05-20 11:00:58',
            ),
            12 => 
            array (
                'id' => 13,
                'num_factura' => 5005954,
                'item' => 10336,
            'nombre_examen' => 'Test De Tzanck (Celulas Herpeticas De Ampollas)',
                'created_at' => '2017-05-20 11:04:27',
                'updated_at' => '2017-05-20 11:04:27',
            ),
            13 => 
            array (
                'id' => 14,
                'num_factura' => 5005954,
                'item' => 10255,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Zielh-N',
                'created_at' => '2017-05-20 11:04:27',
                'updated_at' => '2017-05-20 11:04:27',
            ),
            14 => 
            array (
                'id' => 15,
                'num_factura' => 5005955,
                'item' => 10271,
                'nombre_examen' => 'Marcador Tumoral  En Biopsia - Bcl-6',
                'created_at' => '2017-05-20 11:58:51',
                'updated_at' => '2017-05-20 11:58:51',
            ),
            15 => 
            array (
                'id' => 16,
                'num_factura' => 5005955,
                'item' => 10321,
                'nombre_examen' => 'Receptores Tisulares Estr./Prog.',
                'created_at' => '2017-05-20 11:58:51',
                'updated_at' => '2017-05-20 11:58:51',
            ),
            16 => 
            array (
                'id' => 17,
                'num_factura' => 5005956,
                'item' => 10322,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas',
                'created_at' => '2017-05-20 11:59:42',
                'updated_at' => '2017-05-20 11:59:42',
            ),
            17 => 
            array (
                'id' => 18,
                'num_factura' => 5005956,
                'item' => 10322,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas',
                'created_at' => '2017-05-20 11:59:42',
                'updated_at' => '2017-05-20 11:59:42',
            ),
            18 => 
            array (
                'id' => 19,
                'num_factura' => 5005957,
                'item' => 10228,
                'nombre_examen' => 'Biopsia Pequeña O Por Aspiracion',
                'created_at' => '2017-05-20 12:00:41',
                'updated_at' => '2017-05-20 12:00:41',
            ),
            19 => 
            array (
                'id' => 20,
                'num_factura' => 5005957,
                'item' => 10236,
                'nombre_examen' => 'Pieza De Cirugia Radical',
                'created_at' => '2017-05-20 12:00:41',
                'updated_at' => '2017-05-20 12:00:41',
            ),
            20 => 
            array (
                'id' => 21,
                'num_factura' => 5005958,
                'item' => 10229,
                'nombre_examen' => 'Biopsia Prostatica Por Ultrasonido',
                'created_at' => '2017-05-20 12:02:25',
                'updated_at' => '2017-05-20 12:02:25',
            ),
            21 => 
            array (
                'id' => 22,
                'num_factura' => 5005959,
                'item' => 10334,
                'nombre_examen' => 'Cromatina Sexual',
                'created_at' => '2017-05-20 12:03:24',
                'updated_at' => '2017-05-20 12:03:24',
            ),
            22 => 
            array (
                'id' => 23,
                'num_factura' => 5005961,
                'item' => 10326,
                'nombre_examen' => 'Cit. Genital  Recibida En El Lab.',
                'created_at' => '2017-05-23 09:25:43',
                'updated_at' => '2017-05-23 09:25:43',
            ),
            23 => 
            array (
                'id' => 24,
                'num_factura' => 5005963,
                'item' => 10225,
                'nombre_examen' => 'Biopsia De Medula Osea: Taco Y/O  Coagulo',
                'created_at' => '2017-05-23 09:33:23',
                'updated_at' => '2017-05-23 09:33:23',
            ),
            24 => 
            array (
                'id' => 25,
                'num_factura' => 5005932,
                'item' => 10260,
                'nombre_examen' => 'Marcador Tumoral  En Biopsia - Cd-30',
                'created_at' => '2017-05-27 18:14:25',
                'updated_at' => '2017-05-27 18:14:25',
            ),
            25 => 
            array (
                'id' => 26,
                'num_factura' => 5005932,
                'item' => 10261,
                'nombre_examen' => 'Marcador Tumoral Antigeno Epitelial De Membrana',
                'created_at' => '2017-05-27 18:14:25',
                'updated_at' => '2017-05-27 18:14:25',
            ),
            26 => 
            array (
                'id' => 27,
                'num_factura' => 5005932,
                'item' => 10262,
                'nombre_examen' => 'Marcador Tumoral En Biopsia',
                'created_at' => '2017-05-27 18:14:25',
                'updated_at' => '2017-05-27 18:14:25',
            ),
            27 => 
            array (
                'id' => 28,
                'num_factura' => 5005933,
                'item' => 10262,
                'nombre_examen' => 'Marcador Tumoral En Biopsia',
                'created_at' => '2017-05-27 18:37:57',
                'updated_at' => '2017-05-27 18:37:57',
            ),
            28 => 
            array (
                'id' => 29,
                'num_factura' => 5005933,
                'item' => 10263,
                'nombre_examen' => 'Marcador Tumoral En Biopsia - Actina',
                'created_at' => '2017-05-27 18:37:57',
                'updated_at' => '2017-05-27 18:37:57',
            ),
            29 => 
            array (
                'id' => 30,
                'num_factura' => 5005937,
                'item' => 10239,
            'nombre_examen' => 'Pieza De Cirugia Radical (Diseccion Radical Del Cuello)',
                'created_at' => '2017-05-27 18:37:57',
                'updated_at' => '2017-05-27 18:37:57',
            ),
            30 => 
            array (
                'id' => 31,
                'num_factura' => 5005937,
                'item' => 10240,
            'nombre_examen' => 'Pieza De Cirugia Radical (Gastrectomia Total)',
                'created_at' => '2017-05-27 18:37:57',
                'updated_at' => '2017-05-27 18:37:57',
            ),
            31 => 
            array (
                'id' => 32,
                'num_factura' => 5005938,
                'item' => 10326,
                'nombre_examen' => 'Cit. Genital  Recibida En El Lab.',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            32 => 
            array (
                'id' => 33,
                'num_factura' => 5005939,
                'item' => 10326,
                'nombre_examen' => 'Cit. Genital  Recibida En El Lab.',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            33 => 
            array (
                'id' => 34,
                'num_factura' => 5005936,
                'item' => 10262,
                'nombre_examen' => 'Marcador Tumoral En Biopsia',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            34 => 
            array (
                'id' => 35,
                'num_factura' => 5005936,
                'item' => 10263,
                'nombre_examen' => 'Marcador Tumoral En Biopsia - Actina',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            35 => 
            array (
                'id' => 36,
                'num_factura' => 5005940,
                'item' => 10262,
                'nombre_examen' => 'Marcador Tumoral En Biopsia',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            36 => 
            array (
                'id' => 37,
                'num_factura' => 5005940,
                'item' => 10263,
                'nombre_examen' => 'Marcador Tumoral En Biopsia - Actina',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            37 => 
            array (
                'id' => 38,
                'num_factura' => 5005942,
                'item' => 10260,
                'nombre_examen' => 'Marcador Tumoral  En Biopsia - Cd-30',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            38 => 
            array (
                'id' => 39,
                'num_factura' => 5005942,
                'item' => 10261,
                'nombre_examen' => 'Marcador Tumoral Antigeno Epitelial De Membrana',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            39 => 
            array (
                'id' => 40,
                'num_factura' => 5005942,
                'item' => 10262,
                'nombre_examen' => 'Marcador Tumoral En Biopsia',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            40 => 
            array (
                'id' => 41,
                'num_factura' => 5005943,
                'item' => 10239,
            'nombre_examen' => 'Pieza De Cirugia Radical (Diseccion Radical Del Cuello)',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            41 => 
            array (
                'id' => 42,
                'num_factura' => 5005943,
                'item' => 10240,
            'nombre_examen' => 'Pieza De Cirugia Radical (Gastrectomia Total)',
                'created_at' => '2017-05-27 18:37:58',
                'updated_at' => '2017-05-27 18:37:58',
            ),
            42 => 
            array (
                'id' => 43,
                'num_factura' => 5005969,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            43 => 
            array (
                'id' => 44,
                'num_factura' => 5005965,
                'item' => 10326,
                'nombre_examen' => 'Cit. Genital  Recibida En El Lab.',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            44 => 
            array (
                'id' => 45,
                'num_factura' => 5005972,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            45 => 
            array (
                'id' => 46,
                'num_factura' => 5005970,
                'item' => 10228,
                'nombre_examen' => 'Biopsia Pequeña O Por Aspiracion',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            46 => 
            array (
                'id' => 47,
                'num_factura' => 5005970,
                'item' => 10274,
            'nombre_examen' => 'Marcador Tumoral En Biopsia - Cd 20 (Linfocito B)',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            47 => 
            array (
                'id' => 48,
                'num_factura' => 5005972,
                'item' => 10227,
                'nombre_examen' => 'Biopsia: Interconsulta',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            48 => 
            array (
                'id' => 49,
                'num_factura' => 5005970,
                'item' => 10297,
            'nombre_examen' => 'Marcador Tumoral En Biopsia - Her-2  (Neu-Erb2)',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            49 => 
            array (
                'id' => 50,
                'num_factura' => 5005972,
                'item' => 10271,
                'nombre_examen' => 'Marcador Tumoral  En Biopsia - Bcl-6',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            50 => 
            array (
                'id' => 51,
                'num_factura' => 5005970,
                'item' => 10247,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Brown-Brenn',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            51 => 
            array (
                'id' => 52,
                'num_factura' => 5005972,
                'item' => 10270,
                'nombre_examen' => 'Marcador Tumoral En Biopsia - Bcl2',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            52 => 
            array (
                'id' => 53,
                'num_factura' => 5005970,
                'item' => 10249,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Hierro',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            53 => 
            array (
                'id' => 54,
                'num_factura' => 5005967,
                'item' => 10326,
                'nombre_examen' => 'Cit. Genital  Recibida En El Lab.',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            54 => 
            array (
                'id' => 55,
                'num_factura' => 5005966,
                'item' => 10328,
            'nombre_examen' => 'Cit. Genital (Base Liquida) Recibida En El Lab.',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            55 => 
            array (
                'id' => 56,
                'num_factura' => 5005971,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            56 => 
            array (
                'id' => 57,
                'num_factura' => 5005968,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            57 => 
            array (
                'id' => 58,
                'num_factura' => 5005971,
                'item' => 10237,
            'nombre_examen' => 'Pieza De Cirugia Radical ( Histerectomia Radical)',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            58 => 
            array (
                'id' => 59,
                'num_factura' => 5005971,
                'item' => 10249,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Hierro',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            59 => 
            array (
                'id' => 60,
                'num_factura' => 5005981,
                'item' => 10230,
            'nombre_examen' => 'Biopsia Renal- Examen Histologico(Microscopia De Luz)',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            60 => 
            array (
                'id' => 61,
                'num_factura' => 5005988,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            61 => 
            array (
                'id' => 62,
                'num_factura' => 5005981,
                'item' => 10227,
                'nombre_examen' => 'Biopsia: Interconsulta',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            62 => 
            array (
                'id' => 63,
                'num_factura' => 5005988,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            63 => 
            array (
                'id' => 64,
                'num_factura' => 5005980,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            64 => 
            array (
                'id' => 65,
                'num_factura' => 5005973,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            65 => 
            array (
                'id' => 66,
                'num_factura' => 5005980,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            66 => 
            array (
                'id' => 67,
                'num_factura' => 5005982,
                'item' => 10225,
                'nombre_examen' => 'Biopsia De Medula Osea: Taco Y/O  Coagulo',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            67 => 
            array (
                'id' => 68,
                'num_factura' => 5005982,
                'item' => 10227,
                'nombre_examen' => 'Biopsia: Interconsulta',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            68 => 
            array (
                'id' => 69,
                'num_factura' => 5005982,
                'item' => 10255,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Zielh-N',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            69 => 
            array (
                'id' => 70,
                'num_factura' => 5005989,
                'item' => 10332,
                'nombre_examen' => 'Citologia Otros Sitios',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            70 => 
            array (
                'id' => 71,
                'num_factura' => 5005978,
                'item' => 10228,
                'nombre_examen' => 'Biopsia Pequeña O Por Aspiracion',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            71 => 
            array (
                'id' => 72,
                'num_factura' => 5005975,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            72 => 
            array (
                'id' => 73,
                'num_factura' => 5005978,
                'item' => 10240,
            'nombre_examen' => 'Pieza De Cirugia Radical (Gastrectomia Total)',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            73 => 
            array (
                'id' => 74,
                'num_factura' => 5005975,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            74 => 
            array (
                'id' => 75,
                'num_factura' => 5005978,
                'item' => 10255,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Zielh-N',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            75 => 
            array (
                'id' => 76,
                'num_factura' => 5005978,
                'item' => 10258,
                'nombre_examen' => 'Coloraciones Especiales En Tejido Metenamina',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            76 => 
            array (
                'id' => 77,
                'num_factura' => 5005978,
                'item' => 10254,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Tricomico',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            77 => 
            array (
                'id' => 78,
                'num_factura' => 5005987,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            78 => 
            array (
                'id' => 79,
                'num_factura' => 5005987,
                'item' => 10332,
                'nombre_examen' => 'Citologia Otros Sitios',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            79 => 
            array (
                'id' => 80,
                'num_factura' => 5005983,
                'item' => 10326,
                'nombre_examen' => 'Cit. Genital  Recibida En El Lab.',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            80 => 
            array (
                'id' => 81,
                'num_factura' => 5005984,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            81 => 
            array (
                'id' => 82,
                'num_factura' => 5005984,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            82 => 
            array (
                'id' => 83,
                'num_factura' => 5005984,
                'item' => 10226,
                'nombre_examen' => 'Biopsia De Medula Osea: Taco Y/O Coagulo Mas Frotis',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            83 => 
            array (
                'id' => 84,
                'num_factura' => 5005984,
                'item' => 10225,
                'nombre_examen' => 'Biopsia De Medula Osea: Taco Y/O  Coagulo',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            84 => 
            array (
                'id' => 85,
                'num_factura' => 5005984,
                'item' => 10227,
                'nombre_examen' => 'Biopsia: Interconsulta',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            85 => 
            array (
                'id' => 86,
                'num_factura' => 5005985,
                'item' => 10328,
            'nombre_examen' => 'Cit. Genital (Base Liquida) Recibida En El Lab.',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            86 => 
            array (
                'id' => 87,
                'num_factura' => 5005977,
                'item' => 10235,
                'nombre_examen' => 'Revision y entrega de material de biopsia  para estudios Especiales',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            87 => 
            array (
                'id' => 88,
                'num_factura' => 5005974,
                'item' => 10241,
            'nombre_examen' => 'Pieza De Cirugia Radical (Hemicolectomia)',
                'created_at' => '2017-06-03 11:40:56',
                'updated_at' => '2017-06-03 11:40:56',
            ),
            88 => 
            array (
                'id' => 89,
                'num_factura' => 5005976,
                'item' => 10256,
            'nombre_examen' => 'Coloraciones Especiales En Tejido (Amiloide)',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            89 => 
            array (
                'id' => 90,
                'num_factura' => 5005976,
                'item' => 10247,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Brown-Brenn',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            90 => 
            array (
                'id' => 91,
                'num_factura' => 5005986,
                'item' => 10327,
            'nombre_examen' => 'Cit. Genital (B, Liq.) Tomada  En El Lab.',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            91 => 
            array (
                'id' => 92,
                'num_factura' => 5005976,
                'item' => 10248,
                'nombre_examen' => 'Coloraciones Especiales En Tejido - Gram',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            92 => 
            array (
                'id' => 93,
                'num_factura' => 5005976,
                'item' => 10334,
                'nombre_examen' => 'Cromatina Sexual',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            93 => 
            array (
                'id' => 94,
                'num_factura' => 5005976,
                'item' => 10336,
            'nombre_examen' => 'Test De Tzanck (Celulas Herpeticas De Ampollas)',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            94 => 
            array (
                'id' => 95,
                'num_factura' => 5005991,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            95 => 
            array (
                'id' => 96,
                'num_factura' => 5005979,
                'item' => 10324,
                'nombre_examen' => 'Cit. Aspiracion  Mas De 4 Laminas',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            96 => 
            array (
                'id' => 97,
                'num_factura' => 5005979,
                'item' => 10323,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            97 => 
            array (
                'id' => 98,
                'num_factura' => 5005979,
                'item' => 10330,
                'nombre_examen' => 'Citologia De Cepillado Y Lavado Bronquial',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            98 => 
            array (
                'id' => 99,
                'num_factura' => 5005979,
                'item' => 10329,
                'nombre_examen' => 'Citologia De Cepillado, Lavado Y Biopsia Bronquial',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            99 => 
            array (
                'id' => 100,
                'num_factura' => 5005979,
                'item' => 10331,
                'nombre_examen' => 'Citologia De Liquido: Extendido Y Bloque Celular',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            100 => 
            array (
                'id' => 101,
                'num_factura' => 5005979,
                'item' => 10332,
                'nombre_examen' => 'Citologia Otros Sitios',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            101 => 
            array (
                'id' => 102,
                'num_factura' => 5005990,
                'item' => 10334,
                'nombre_examen' => 'Cromatina Sexual',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            102 => 
            array (
                'id' => 103,
                'num_factura' => 5005992,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            103 => 
            array (
                'id' => 104,
                'num_factura' => 5005990,
                'item' => 10336,
            'nombre_examen' => 'Test De Tzanck (Celulas Herpeticas De Ampollas)',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
            104 => 
            array (
                'id' => 105,
                'num_factura' => 5005992,
                'item' => 10245,
                'nombre_examen' => 'Pieza Quirurgica',
                'created_at' => '2017-06-03 11:40:57',
                'updated_at' => '2017-06-03 11:40:57',
            ),
        ));
        
        
    }
}