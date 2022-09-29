@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">



                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Taxas de Alunos </h3>
                                <a href="{{ route('student.fee.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5"> Add / Editar Taxas</a>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>ID No</th>
                                                <th>Nome</th>
                                                <th>Ano</th>
                                                <th>Turma</th>
                                                <th>Tipo de Taxa</th>
                                                <th>Soma</th>
                                                <th>Data</th>

                                                <th width="15%">Ações</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $value['stduent']['id_no'] }}</td>
                                                    <td> {{ $value['stduent']['name'] }}</td>
                                                    <td> {{ $value['stduent_year']['name'] }}</td>
                                                    <td> {{ $value['stduent_class']['name'] }}</td>
                                                    <td> {{ $value['fee_category']['name'] }}</td>
                                                    <td> {{ $value->amount }}</td>
                                                    <td> {{ date('M Y', strtotime($value->date)) }}</td>

                                                    <td>



                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
