<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multas</title>
</head>
<style>
    .borderarriba
    {
        border-top: black 1px dashed;
    }
    .negrita
    {
        font-weight: bold;
    }
    .border
    {
        /* border: solid 1px black; */
        border: black 1px dashed;
    }
    
    body {
    margin: 0;
    font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #ffffff;
    }
    
    thead {
        display: table-header-group;
    }
    tr,
    img {
        page-break-inside: avoid;
    }
    p,
    h2,
    h3 {
        orphans: 3;
        widows: 3;
    }
    h2,
    h3 {
        page-break-after: avoid;
    }
    body {
        min-width: 992px !important;
    }
    .container {
        min-width: 992px !important;
    }
    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th{
        padding: $el-padding-3 $el-padding-5;
        border-top: 0;
    }

    .table>thead>tr>th{
        border-bottom: 1px solid map-get($colors, 9);
    }
    .table {
        border: 1px solid map-get($colors, 9);
        background-color: #fff;
        border-radius: $radius-primary;

        tbody{
            tr:not(:first-child){
                border-top: 1px solid map-get($colors, 9);
            }
        } 


        th, td {
            vertical-align: middle;
            border: 0;
        }

        thead{
            background-color: map-get($colors, 10);
            th{
                vertical-align: bottom;
                font-family: $font-1;
                font-size: modular-scale(-1);
            }
        }
    }

    .table-striped {
        tbody tr:nth-of-type(even) {
            background-color: map-get($colors, 11);
        }
        tbody tr:nth-of-type(odd) {
            background-color: #fff;
        }
    }
</style>
<body>
    <div class="container-fluid">
        
        <div class="row">
            <table border="1" style="border-style:solid;border-width: 2px;border-collapse: collapse;font-size: 12px">
                <tr>
                    <td>Documento</td>
                    <td>Nombres</td>
                    <td>Fecha</td>
                    <td>Monto</td>
                    <td>Descuento</td>
                    <td>Modelo</td>
                    <td>Placa</td>
                    <td>Codigo Multa</td>
                </tr>
                @foreach($multas as $i)
                <tr>
                    <td>{{$i->Documento}}</td>
                    <td>{{$i->Nombre}}</td>
                    <td>{{$i->Fecha}}</td>
                    <td>{{$i->Monto}}</td>
                    <td>{{$i->Descuento}}</td>
                    <td>{{$i->Modelo}}</td>
                    <td>{{$i->Placa}}</td>
                    <td>{{$i->Multa}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        {{-- <div style="page-break-after:always;"></div> --}}
       
</body>
</html>