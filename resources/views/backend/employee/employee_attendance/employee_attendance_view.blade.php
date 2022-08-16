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
                                <h3 class="box-title">Registro de Comparecimento </h3>
                                <a href="{{ route('employee.attendance.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5"> Adicionar Registro de Comparecimento</a>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Nome</th>
                                                <th>ID Nº </th>
                                                <th>Data </th>
                                                <th>Status de Comparecimento</th>
                                                <th width="25%">Ações</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $value['user']['name'] }}</td>
                                                    <td> {{ $value['user']['id_no'] }}</td>
                                                    <td> {{ date('d/m/Y', strtotime($value->date)) }}</td>
                                                    <td> {{ $value->attend_status }}</td>
                                                    <td>
                                                        <a href="{{ route('employee.attendance.edit', $value->date) }}"
                                                            class="btn btn-info">Editar</a>
                                                        <a href="{{ route('employee.attendance.details', $value->date) }}"
                                                            class="btn btn-danger">Details</a>

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
