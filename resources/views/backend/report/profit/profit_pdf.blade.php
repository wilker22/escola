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
                    <?php $image_path = '/upload/logo.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="100">

                </h2>
            </td>
            <td>
                <h2>WTech - School ERP</h2>
                <p>Rua Seul , 81 - Loteamento Nova York</p>
                <p>Phone : 87-988278-3964</p>
                <p>Email : escola@wtech.com</p>
                <p> <b> Lucro - Mensal/Anual </b> </p>

            </td>
        </tr>


    </table>

    @php

        $student_fee = App\Models\AccountStudentFee::whereBetween('date', [$start_date, $end_date])->sum('amount');

        $other_cost = App\Models\AccountOtherCost::whereBetween('date', [$sdate, $edate])->sum('amount');

        $emp_salary = App\Models\AccountEmployeeSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');

        $total_cost = $other_cost + $emp_salary;
        $profit = $student_fee - $total_cost;

    @endphp

    <table id="customers">
        <tr>
            <td colspan="2" style="text-align: center;">
                <h4>Data: {{ date('d M Y', strtotime($sdate)) }} - {{ date('d M Y', strtotime($edate)) }}
                </h4>

            </td>
        </tr>
        <tr>
            <td width="50%">
                <h4>Propósito</h4>
            </td>
            <td width="50%">
                <h4>Valor</h4>
            </td>

        </tr>
        <tr>
            <td>Mensalidade de Alunos </td>
            <td> {{ $student_fee }}</td>

        </tr>

        <tr>
            <td>Salários </td>
            <td> {{ $emp_salary }} </td>

        </tr>

        <tr>
            <td>Outras Despesas</td>
            <td> {{ $other_cost }} </td>

        </tr>
        <tr>
            <td>Total dos Custos</td>
            <td> {{ $total_cost }} </td>

        </tr>

        <tr>
            <td>Lucro </td>
            <td>{{ $profit }}</td>

        </tr>


    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Data : {{ date('d M Y') }}</i>

    <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">


</body>

</html>
