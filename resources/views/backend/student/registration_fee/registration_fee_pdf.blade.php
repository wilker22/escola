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
@php
    $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','1')
                                        ->where('class_id',$v->class_id)
                                        ->first();
    $originalfee = $registrationfee->amount;
    $discount = $details['discount']['discount'];
    $discounttablefee = $discount/100*$originalfee;
    $finalfee = (float)$originalfee-(float)$discounttablefee;
@endphp
<table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td><b>Student ID No</b></td>
      <td>{{ $details['student']['id_no'] }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td><b>Pefil No</b></td>
      <td>{{ $details->roll }}</td>
    </tr>
  
      <tr>
      <td>3</td>
      <td><b>Nome</b></td>
      <td>{{ $details['student']['name'] }}</td>
    </tr>
  
    <tr>
      <td>4</td>
      <td><b>Pai</b></td>
      <td>{{ $details['student']['fname'] }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td><b>Ano</b></td>
      <td>{{ $details['student_year']['name'] }}</td>
    </tr>
    <tr>
      <td>6</td>
      <td><b>Curso </b></td>
      <td>{{ $details['student_class']['name'] }}</td>
    </tr>
    <tr>
      <td>7</td>
      <td><b>Taxa de Matrícula</b></td>
      <td>R$ {{ $originalfee }} </td>
    </tr>
    <tr>
      <td>8</td>
      <td><b>Desconto</b></td>
      <td> {{ $discount  }} %</td>
    </tr>
  
      <tr>
      <td>9</td>
      <td><b>Taxa Calculada </b></td>
      <td>R$ {{ $finalfee }} </td>
    </tr>
   
      
     
  </table>
  <br> <br>
    <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>
  
  <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">
  
  <table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td><b>ID No</b></td>
      <td>{{ $details['student']['id_no'] }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td><b>Perfil No</b></td>
      <td>{{ $details->roll }}</td>
    </tr>
  
      <tr>
      <td>3</td>
      <td><b>Nome</b></td>
      <td>{{ $details['student']['name'] }}</td>
    </tr>
  
    <tr>
      <td>4</td>
      <td><b>Pai</b></td>
      <td>{{ $details['student']['fname'] }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td><b>Ano</b></td>
      <td>{{ $details['student_year']['name'] }}</td>
    </tr>
    <tr>
      <td>6</td>
      <td><b>Curso </b></td>
      <td>{{ $details['student_class']['name'] }}</td>
    </tr>
    <tr>
      <td>7</td>
      <td><b>Taxa de Matrícula</b></td>
      <td>R$ {{ $originalfee }} </td>
    </tr>
    <tr>
      <td>8</td>
      <td><b>Desconto</b></td>
      <td>{{ $discount  }} %</td>
    </tr>
  
      <tr>
      <td>9</td>
      <td><b>Taxa Calculada </b></td>
      <td>R$ {{ $finalfee }} </td>
    </tr>
   
      
     
  </table>
<br><br>
    <i style="font-size: 10px; float: right;"> <b>Petrolina</b>, {{ date("d/m/Y - H:m:s") }}</i>

</body>

</html>
