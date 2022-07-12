@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Aluno -  <strong> Buscar</strong></h4>
                            </div>
                            <div class="box-body">
                                <form method="GET" action="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Ano <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="year_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Selecione o Ano
                                                        </option>
                                                        @foreach ($years as $year)
                                                            <option value="{{ $year->id }}"
                                                              <option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "selected":"" }} >{{ $year->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 4 -->




                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Turma <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="class_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Selecione a Turma
                                                        </option>
                                                        @foreach ($classes as $class)
                                                          <option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 4 -->


                                        <div class="col-md-4" style="padding-top: 25px;">

                                            <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search"
                                                value="Buscar">

                                        </div> <!-- End Col md 4 -->




                                    </div><!--  end row -->

                                </form>


                            </div>
                        </div>
                    </div> <!-- // end first col 12 -->




                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Lista de Alunos</h3>
                                <a href="{{ route('student.registration.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5">Cadastrar Aluno</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Name</th>
                                                <th>Id No</th>
                                                <th>Ações</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            @foreach ($allData as $key => $value)
                                                <tr>
                                                    <td style="width: 5%">{{ $key + 1 }}</td>
                                                    <td>{{ $value->class_id }}</td>
                                                    <td>{{ $value->year_id }}</td>
                                                    <td style="width: 25%">
                                                        <a href="" class="btn btn-info">Editar</a>
                                                        <a href="" class="btn btn-danger" id="delete">Remover</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


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
