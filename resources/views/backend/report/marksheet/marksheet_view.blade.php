@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Relatórios -  <strong>Boletim de Notas</strong></h4>
                            </div>

                            <div class="box-body">

                                <form method="GET" action="{{ route('report.marksheet.get') }}" target="_blank">
                                    @csrf
                                    <div class="row">



                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Ano <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Selecione o Ano
                                                        </option>
                                                        @foreach ($years as $year)
                                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->




                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Turma <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="class_id" id="class_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Selecione a Turma
                                                        </option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->





                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Tipo de Prova <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="exam_type_id" id="exam_type_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select o Tipo de Prova
                                                        </option>
                                                        @foreach ($exam_type as $exam)
                                                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->



                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>ID No <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="id_no" class="form-control"
                                                        required="">
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->





                                        <div class="col-md-3">

                                            <input type="submit" class="btn btn-rounded btn-primary" value="Buscar">


                                        </div> <!-- End Col md 3 -->
                                    </div><!--  end row -->



                                </form>


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
