<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('/categorias', function () {

    $categorias = json_decode(json_encode([

        ["codigo"=>"A02","categoria"=>"Medicamentos para el tratamiento de Trastornos causados por Ácidos"],

        ["codigo"=>"A03","categoria"=>"Medicamentos contra Trastornos Funcionales Gastrointestinales"],

        ["codigo"=>"A04","categoria"=>"Medicamentos Antieméticos y Antinauseosos"],

        ["codigo"=>"A06","categoria"=>"Medicamentos para el Estreñimiento"],

        ["codigo"=>"A07","categoria"=>"Medicamentos Antidiarreicos, Antiinflamatorios y Antiinfecciosos Intestinales"],

        ["codigo"=>"A10","categoria"=>"Medicamentos usados en Diabetes"],

        ["codigo"=>"A11","categoria"=>"Vitaminas"],

        ["codigo"=>"A12","categoria"=>"Suplementos Minerales"]

    ]));

    $html="<h1>Categorías</h1>";

    $html.="<table border='1' cellpadding='8'>";

    $html.="<tr><th>Código</th><th>Categoría</th></tr>";

    foreach($categorias as $categoria){

        $html.="<tr>";

        $html.="<td>$categoria->codigo</td>";

        $html.="<td>$categoria->categoria</td>";

        $html.="</tr>";

    }

    $html.="</table>";

    return $html;

});

Route::get('/medicamentos', function () {

    $medicamentos = json_decode(json_encode([

["codigo"=>"A02BA02","numero"=>1,"nombre"=>"Ranitidina","dosis"=>"50 mg","forma"=>"Líquidos parenterales","via"=>"IM/IV"],

["codigo"=>"A02BA03","numero"=>2,"nombre"=>"Famotidina","dosis"=>"40 mg","forma"=>"Sólidos orales","via"=>"VO"],

["codigo"=>"A02BC01","numero"=>3,"nombre"=>"Omeprazol","dosis"=>"20 mg","forma"=>"Sólidos orales","via"=>"VO"],

["codigo"=>"A02BC01","numero"=>4,"nombre"=>"Omeprazol","dosis"=>"40 mg","forma"=>"Sólidos parenterales","via"=>"IV"],

["codigo"=>"A03BA01","numero"=>1,"nombre"=>"Atropina (Sulfato)","dosis"=>"0.5–1 mg/mL","forma"=>"Líquidos parenterales","via"=>"SC/IM/IV"],

["codigo"=>"A03BA03","numero"=>2,"nombre"=>"Hiosciamina","dosis"=>"10 mg","forma"=>"Sólidos orales","via"=>"VO"],

["codigo"=>"A03BA03","numero"=>3,"nombre"=>"Hiosciamina","dosis"=>"20 mg/mL","forma"=>"Líquidos parenterales","via"=>"IM/IV"],

["codigo"=>"A03FA01","numero"=>4,"nombre"=>"Metoclopramida","dosis"=>"5 mg/mL","forma"=>"Líquidos parenterales","via"=>"IM/IV"],

["codigo"=>"A03FA01","numero"=>5,"nombre"=>"Metoclopramida","dosis"=>"10 mg","forma"=>"Sólidos orales","via"=>"VO"],

["codigo"=>"A04AA01","numero"=>1,"nombre"=>"Ondansetron","dosis"=>"8 mg","forma"=>"Sólidos orales","via"=>"VO"],

["codigo"=>"A04AA01","numero"=>2,"nombre"=>"Ondansetron","dosis"=>"2 mg/mL","forma"=>"Líquidos parenterales","via"=>"IV"],

["codigo"=>"A04AA02","numero"=>3,"nombre"=>"Granisetron","dosis"=>"1 mg","forma"=>"Sólidos orales","via"=>"VO"],

["codigo"=>"A04AA02","numero"=>4,"nombre"=>"Granisetron","dosis"=>"1 mg/mL","forma"=>"Líquidos parenterales","via"=>"IV"],

["codigo"=>"R06AA11","numero"=>5,"nombre"=>"Dimenhidrinato","dosis"=>"50 mg","forma"=>"Sólidos orales","via"=>"VO"],

["codigo"=>"R06AA11","numero"=>6,"nombre"=>"Dimenhidrinato","dosis"=>"50 mg/mL","forma"=>"Líquidos parenterales","via"=>"IM/IV"]

]));

$html="<h1>Medicamentos</h1>";

$html.="<table border='1' cellpadding='8'>";

$html.="<tr>

<th>Código</th>

<th>N°</th>

<th>Nombre</th>

<th>Dosis</th>

<th>Forma farmacéutica</th>

<th>Vía</th>

</tr>";

foreach($medicamentos as $m){

$html.="<tr>";

$html.="<td>$m->codigo</td>";

$html.="<td>$m->numero</td>";

$html.="<td>$m->nombre</td>";

$html.="<td>$m->dosis</td>";

$html.="<td>$m->forma</td>";

$html.="<td>$m->via</td>";

$html.="</tr>";

}

$html.="</table>";

return $html;

});

Route::get('/clientes/vip', function () {

    // Creamos la lista de clientes
    $clientes = [

        (object)[
            'id' => 1,
            'nombre' => 'Karen Criollo',
            'telefono' => '+50370000000',
            'puntos_acumulados' => 15
        ],

        (object)[
            'id' => 2,
            'nombre' => 'Joel Cruz',
            'telefono' => '+50376000000',
            'puntos_acumulados' => 5
        ],

        (object)[
            'id' => 3,
            'nombre' => 'Cristofer Guevara',
            'telefono' => '+50376600000',
            'puntos_acumulados' => 25
        ]

    ];

    // Creamos la tabla HTML
    $html = "
        <h1>Clientes VIP</h1>

        <table border='1' cellpadding='8'>
            <tr>
                <th>ID CLIENTE</th>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>PUNTOS ACUMULADOS</th>
            </tr>
    ";

    // Recorremos la lista de clientes
    foreach ($clientes as $cliente) {

        $html .= "
            <tr>
                <td>$cliente->id</td>
                <td>$cliente->nombre</td>
                <td>$cliente->telefono</td>
                <td>$cliente->puntos_acumulados</td>
            </tr>
        ";
    }

    $html .= "</table>";

    return $html;

});

Route::get('/proveedores/internacionales', function () {

    // Creamos la lista de proveedores
    $proveedores = [
        (object)[
            'empresa' => 'Pfizer',
            'pais_origen' => 'Estados Unidos',
            'medicamento_principal' => 'Ibuprofeno',
            'tiempo_entrega_dias' => 10
        ],

        (object)[
            'empresa' => 'Bayer',
            'pais_origen' => 'Alemania',
            'medicamento_principal' => 'Aspirina',
            'tiempo_entrega_dias' => 18
        ],

        (object)[
            'empresa' => 'Roche',
            'pais_origen' => 'Suiza',
            'medicamento_principal' => 'Paracetamol',
            'tiempo_entrega_dias' => 20
        ]
    ];

    // Creamos la tabla
    $html = '
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>EMPRESA</th>
                    <th>PAIS DE ORIGEN</th>
                    <th>MEDICAMENTO PRINCIPAL</th>
                    <th>TIEMPO DE ENTREGA</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($proveedores as $proveedor) {

        $advertencia = '';

        if ($proveedor->tiempo_entrega_dias > 15) {
            $advertencia = ' (Demora Crítica)';
        }

        $html .= "
            <tr>
                <td>$proveedor->empresa</td>
                <td>$proveedor->pais_origen</td>
                <td>$proveedor->medicamento_principal</td>
                <td>$proveedor->tiempo_entrega_dias días $advertencia</td>
            </tr>
        ";
    }

    $html .= '
            </tbody>
        </table>
    ';

    echo $html;
});

Route::get('/lotes/inventario', function () {

    // Lista de lotes
    $lotes = [

        (object)[
            'codigo_lote' => 'LT001',
            'nombre_medicamento' => 'Insulina',
            'cantidad_cajas' => 50,
            'temperatura_requerida_celsius' => 4
        ],

        (object)[
            'codigo_lote' => 'LT002',
            'nombre_medicamento' => 'Paracetamol',
            'cantidad_cajas' => 120,
            'temperatura_requerida_celsius' => 25
        ],

        (object)[
            'codigo_lote' => 'LT003',
            'nombre_medicamento' => 'Vacuna Influenza',
            'cantidad_cajas' => 30,
            'temperatura_requerida_celsius' => 2
        ]
    ];

    // Creamos la tabla
    $html = '
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>CODIGO LOTE</th>
                    <th>MEDICAMENTO</th>
                    <th>CANTIDAD DE CAJAS</th>
                    <th>TEMPERATURA</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($lotes as $lote) {

        $etiqueta = '';

        if ($lote->temperatura_requerida_celsius <= 5) {
            $etiqueta = ' [Requiere Cadena de Frío]';
        }

        $html .= "
            <tr>
                <td>$lote->codigo_lote</td>
                <td>$lote->nombre_medicamento $etiqueta</td>
                <td>$lote->cantidad_cajas</td>
                <td>$lote->temperatura_requerida_celsius °C</td>
            </tr>
        ";
    }

    $html .= '
            </tbody>
        </table>
    ';

    echo $html;
});