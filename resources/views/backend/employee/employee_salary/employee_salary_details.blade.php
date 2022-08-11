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
                                <h3 class="box-title">Detalhamento Salarial</h3>
                                <h5><strong> Nome </strong> {{ $details->name }} </h5>
                                <h5><strong> ID Nº </strong> {{ $details->id_no }} </h5>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Salário Anterior</th>
                                                <th>Aumento de Salário</th>
                                                <th>Salário Atual</th>
                                                <th>Data da Efetivação Salarial</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($salary_log as $key => $log)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $log->previous_salary }}</td>
                                                    <td> {{ $log->increment_salary }}</td>
                                                    <td> {{ $log->present_salary }}</td>
                                                    <td> {{ $log->effected_salary }}</td>


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
