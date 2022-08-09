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
                    {{-- <div class="tile-image" style="width: 98%;"><img src="{{ public_path('images/user-info.jpg') }}""></div> --}}
                    {{-- <div class="tile-image" style="width: 50%;"><img src="{{ public_path('images/logo.png') }}"></div> --}}
                    <img src="{{ public_path('images/logo.png') }}" style="width: 70px; height: 50px"><br>
                    WTech - Consultoria em TI
                </h2>
            </td>
            <td>
                <h2>Sistema Administração Escolar</h2>
                <p>Rua 5, 260 - Sol Nascente 3 - Petrolina/PE</p>
                <p>Telefone: (87)98827-3964</p>
                <p>Suporte: suporte@wtech.com</p>
                <p><b>Ficha do Funcionário</b></p>
            </td>
        </tr>

    </table>



    <table id="customers">
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Dados do Funcionário</th>
            <th width="45%">Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Foto</b> </td>
            <td>
                <img src="{{ public_path('upload/employee_images/' . $details->image ) }}" style="width: 70px; height: 70px;">
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Nome</b></td>
            <td>{{ $details->name }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>ID Nº</b></td>
            <td>{{ $details->id_no }}</td>
        </tr>


        <tr>
            <td>3</td>
            <td><b>Pai</b></td>
            <td>{{ $details->fname }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Mãe</b></td>
            <td>{{ $details->mname }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Telefone Móvel </b></td>
            <td>{{ $details->mobile }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Endereço</b></td>
            <td>{{ $details->address }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Gênero</b></td>
            <td>{{ $details->gender }}</td>
        </tr>

        <tr>
            <td>9</td>
            <td><b>Religião</b></td>
            <td>{{ $details->religion }}</td>
        </tr>


        <tr>
            <td>10</td>
            <td><b>Data de Nascimento</b></td>
            <td>{{ date('d/m/Y', strtotime($details->dob)) }}</td>
        </tr>
        <tr>
            <td>11</td>
            <td><b> Função </b></td>
            <td>{{ $details['designation']['name'] }} </td>
        </tr>
        <tr>
            <td>12</td>
            <td><b>Admissão </b></td>
            <td>{{ date('d/m/Y', strtotime($details->join_date)) }}</td>
        </tr>
        <tr>
            <td>13</td>
            <td><b>Salário </b></td>
            <td>{{ $details->salary }}</td>
        </tr>


    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Data de Emissão : {{ date('d M Y') }}</i>

</body>

</html>
