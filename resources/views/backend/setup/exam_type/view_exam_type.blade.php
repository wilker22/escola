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
                                <h3 class="box-title">Lista de Exames - Tipo</h3>
                                <a href="{{ route('exam.type.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5"> Cadastrar Exame - Tipo</a>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Nome</th>
                                                <th width="25%">Ações</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $exam)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $exam->name }}</td>
                                                    <td>
                                                        <a href="{{ route('exam.type.edit', $exam->id) }}"
                                                            class="btn btn-info">Editar</a>
                                                        <a href="{{ route('exam.type.delete', $exam->id) }}"
                                                            class="btn btn-danger" id="delete">Remover</a>

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
