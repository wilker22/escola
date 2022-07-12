@extends('admin.admin_master')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Cadastrar Aluno</h4>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('student.registration.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    
                                                    <div class="row"><!--1nd row-->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Nome do Aluno<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="name" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Nome do Pai<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="nfather" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Nome da Mãe<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="nmother" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                    </div><!--end 1nd row-->

                                                    <div class="row"><!--2nd row-->
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <h5>Tel. Celular<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="mobile" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>E-mail<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="email" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Endereço<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="adress" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <h5>Gênero<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="gender" id="gender" required class="form-control">
                                                                        <option value="">Selecione...</option>
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Feminino">Feminino</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                    </div><!--end 2nd row-->

                                                    <div class="row"><!--3th row-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Religião<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="religion" id="religion" required class="form-control">
                                                                        <option value="">Selecione...</option>
                                                                        <option value="Evangélica">Evangélica</option>
                                                                        <option value="Católica">Católica</option>
                                                                        <option value="Espírita">Espírita</option>
                                                                        <option value="TJ">Testemunha de Jeová</option>
                                                                        <option value="Outra">Outra</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Data de Nascimento<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="date" name="dob" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Desconto<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="discount" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                       

                                                    </div><!--end 3th row-->


                                                    <div class="row"><!--4th row-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Ano<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="year_id"  required class="form-control">
                                                                        <option value="">Selecione...</option>
                                                                        @foreach ($years as $year )
                                                                            <option value="{{ $year->id}}">{{ $year->name}}</option>    
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Curso<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="group_id" required class="form-control">
                                                                        <option value="">Selecione...</option>
                                                                        @foreach ($groups as $group )
                                                                            <option value="{{ $group->id}}">{{ $group->name}}</option>    
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Turma<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="class_id"  required class="form-control">
                                                                        <option value="">Selecione...</option>
                                                                        @foreach ($classes as $class )
                                                                            <option value="{{ $class->id}}">{{ $class->name}}</option>    
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                       

                                                    </div><!--end 4th row-->

                                                    <div class="row"><!--5th row-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Turno<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="shift_id" required class="form-control">
                                                                        <option value="">Selecione...</option>
                                                                        @foreach ($shifts as $shift )
                                                                            <option value="{{ $shift->id}}">{{ $shift->name}}</option>    
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Foto<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input id="image" type="file" name="image" required class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <img id="showImage" src="{{ url(!empty($userEdit->image) ? url('upload/user_images/'.$userEdit->image) : url('upload/no_image.jpg')) }}" style="width: 100px; heigth: 100px;">
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                       

                                                    </div><!--end 5th row-->
                                                   

                                                </div><!-- end col-md-12-->
                                            </div><!-- end row-->
                                            
                                            

                                           
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" value="Cadastrar" class="btn btn-rounded btn-info mb-5">
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

    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
