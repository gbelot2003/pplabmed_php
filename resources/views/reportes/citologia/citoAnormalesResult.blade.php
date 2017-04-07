@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb hidden-print">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('ReportesController@hojaCitoForm') }}">Citologias Anormales</a></li>
        <li class="active">Citologias Anormales </li>
    </ol>
@stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>Citologias Anormales</h3>
                    <input type="button" class="btn btn-info btn-xs hidden-print" name="imprimir" value="Imprimir" onclick="window.print();"> <span class="hidden-print"> | </span>
                    <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }} Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                    <th>EDAD</th>
                    <th>Negativos</th>
                    <th>BAJO GRADO NICI</th>
                    <th>ALTO GRADO NIC II</th>
                    <th>CA "INSITO" NIC III</th>
                    <th>A TIPIADA DE SIGNIFICADO NO DETERMINADO</th>
                    <th>CARCIOMA INVASOR</th>
                    <th>ASCUS</th>
                    <th>LCR</th>
                    <th>OTROS</th>
                    <th>TOTAL</th>
                    <th>CONVENCIONAL</th>
                    <th>BASE LIQUIDA</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0 -14</td>
                            @foreach($a as $uno)
                                <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>15 - 19</td>
                            @foreach($b as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>20 - 24</td>
                            @foreach($c as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>25 - 30</td>
                            @foreach($d as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>30 - 34</td>
                            @foreach($e as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>35 - 39</td>
                            @foreach($f as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>40 - 44</td>
                            @foreach($g as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>45 - 49</td>
                            @foreach($h as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>50 - 54</td>
                            @foreach($i as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>55 - 60</td>
                            @foreach($j as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                <td>
                                    {{
                                        $uno->total - $uno->bs
                                    }}
                                </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>60 - MAS</td>
                            @foreach($k as $uno)
                                    <td>{{ isset($uno->ID1) ? $uno->ID1 : 0 }}</td>
                                    <td>{{ isset($uno->ID2) ? $uno->ID2 : 0 }}</td>
                                    <td>{{ isset($uno->ID3) ? $uno->ID3 : 0 }}</td>
                                    <td>{{ isset($uno->ID4) ? $uno->ID4 : 0 }}</td>
                                    <td>{{ isset($uno->ID6) ? $uno->ID6 : 0 }}</td>
                                    <td>{{ isset($uno->ID7) ? $uno->ID7 : 0 }}</td>
                                    <td>{{ isset($uno->ID8) ? $uno->ID8 : 0 }}</td>
                                    <td>{{ isset($uno->ID9) ? $uno->ID9 : 0 }}</td>
                                    <td>{{ isset($uno->ID10) ? $uno->ID10 : 0 }}</td>
                                    <td>{{ isset($uno->total) ? $uno->total : 0 }}</td>
                                    <td>
                                        {{
                                        $uno->total - $uno->bs
                                        }}
                                    </td>
                                    <td>{{ isset($uno->bs) ? $uno->bs : 0 }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop