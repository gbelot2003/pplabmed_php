<?php

namespace Tests\Unit;

use Acme\Helpers\PdfStringConversor;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pdfStringConversorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /**
     * @test
     */
    public function a_convertion_from_uft8_to_win123()
    {
        $data = 'Biopsia Pequeña O Por Aspiración';

        $convert = new PdfStringConversor();
        $convert->convert($data);

        dd($convert);

    }
}
