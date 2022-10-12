<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>


    <table id="customers">
        <tr>
            <td>
                <h2>
                    <?php $image_path = '/upload/easyschool.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="100">

                </h2>
            </td>
            <td>
                <h2>WTech - Sistema Educacional</h2>
                <p>Endereço da Escola</p>
                <p>Phone : 343434343434</p>
                <p>Email : support@wtech.com</p>
                <p> <b>Relatório de Comparecimento de Colaboradores </b> </p>

            </td>
        </tr>


    </table>
    <br> <br>
    <strong>Nome: </strong> {{ $allData['0']['user']['name'] }}, <strong> ID No :
    </strong>{{ $allData['0']['user']['id_no'] }}, <strong> Month : </strong> {{ $month }}
    <br> <br>
    <table id="customers">

        <tr>
            <td width="50%">
                <h4>Data</h4>
            </td>
            <td width="50%">
                <h4> Status </h4>
            </td>
        </tr>

        @foreach ($allData as $value)
            <tr>
                <td width="50%"> {{ date('d-m-Y', strtotime($value->date)) }} </td>
                <td width="50%"> {{ $value->attend_status }} </td>
            </tr>
        @endforeach

        <tr>
            <td colspan="2">
                <strong>Total de Faltas : </strong> {{ $absents }} , <strong> Total de Demissões : </strong>
                {{ $leaves }}

            </td>
        </tr>

    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Data : {{ date('d M Y') }}</i>

    <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">




</body>

</html>
