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
            background-color: #04AA6D;
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
            </td>
        </tr>

    </table>


    <table id="customers">
        <tr>
            <th width="10%">Sl</th>
            
            <th width="45%">Detalhes do Aluno</th>
            <th width="45%">Dados do Aluno</th>

        </tr>
        <tr>
            <td>1</td>
            <td>Foto do Aluno</td>
            <td>
                <img src="{{ public_path('upload/student_images/' . $details['student']['image'] ) }}" style="width: 70px; height: 50px">
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Nome do Aluno</b></td>
            <td>{{ $details['student']['name'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Matrícula</b></td>
            <td>{{ $details['student']['id_no'] }}</td>
        </tr>

        <tr>
            <td>3</td>
            <td><b>Perfil</b></td>
            <td>{{ $details->roll }}</td>
        </tr>

        <tr>
            <td>4</td>
            <td><b>Pai</b></td>
            <td>{{ $details['student']['fname'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Mãe</b></td>
            <td>{{ $details['student']['mname'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Telefone </b></td>
            <td>{{ $details['student']['mobile'] }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Endereço</b></td>
            <td>{{ $details['student']['address'] }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Gênero</b></td>
            <td>{{ $details['student']['gender'] }}</td>
        </tr>

        <tr>
            <td>9</td>
            <td><b>Religião</b></td>
            <td>{{ $details['student']['religion'] }}</td>
        </tr>


        <tr>
            <td>10</td>
            <td><b>Data de Nascimento</b></td>
            <td>{{ $details['student']['dob'] }}</td>
        </tr>
         <tr>
            <td>11</td>
            <td><b>Desconto </b></td>
            <td>{{ $details['discount']['discount'] }} %</td>
        </tr>
        <tr>
            <td>12</td>
            <td><b>Ano </b></td>
            <td>{{ $details['student_year']['name'] }}</td>
        </tr>
        
        <tr>
            <td>14</td>
            <td><b>Curso </b></td>
            <td>{{ $details['group']['name'] }}</td>
        </tr>
        <tr>
            <td>13</td>
            <td><b>Turma </b></td>
            <td>{{ $details['student_class']['name'] }}</td>
        </tr>
        <tr>
            <td>15</td>
            <td><b>Turno </b></td>
            <td>{{ $details['shift']['name'] }}</td>
        </tr>

    </table>
<br><br>
    <i style="font-size: 10px; float: right;"> <b>Petrolina</b>, {{ date("d/m/Y - H:m:s") }}</i>

</body>

</html>
