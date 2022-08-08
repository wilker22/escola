@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Cadastrar Funcionário </h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('store.employee.registration') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">



                                            <div class="row">
                                                <!-- 1st Row -->

                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Nome <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Pai <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="fname" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->



                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Mãe <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mname" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                            </div> <!-- End 1stRow -->






                                            <div class="row">
                                                <!-- 2nd Row -->

                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Telefone Móvel  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Endereço <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->



                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Gênero <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Selecione o
                                                                    Gênero</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                            </div> <!-- End 2nd Row -->



                                            <div class="row">
                                                <!-- 3rd Row -->


                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Religião <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Selecione a
                                                                    Religião</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Christan">Cristã</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->




                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Data de Nascimento <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="dob" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Função <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="designation_id" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Selecione o função...</option>
                                                                @foreach ($designation as $desig)
                                                                    <option value="{{ $desig->id }}">{{ $desig->name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                            </div> <!-- End 3rd Row -->




                                            <div class="row">
                                                <!-- 4TH Row -->


                                                <div class="col-md-3">

                                                    <div class="form-group">
                                                        <h5>Salário <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="salary" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 3 -->




                                                <div class="col-md-3">

                                                    <div class="form-group">
                                                        <h5>Data de Adminissão <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="join_date" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 3 -->


                                                <div class="col-md-3">

                                                    <div class="form-group">
                                                        <h5>Foto <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control"
                                                                id="image">
                                                        </div>
                                                    </div>


                                                </div> <!-- End Col md 3 -->


                                                <div class="col-md-3">

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                                style="width: 100px; width: 100px; border: 1px solid #000000;">

                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 3 -->


                                            </div> <!-- End 4TH Row -->



                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                    value="Cadastrar">
                                            </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>





        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
