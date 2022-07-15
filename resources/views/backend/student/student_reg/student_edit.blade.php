@extends('admin.admin_master')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Editar Aluno</h4>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                
                                <form method="post" action="{{ route('student.registration.update',$editData->student_id) }}" enctype="multipart/form-data">
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
                                                                    <input type="text" name="name" value="{{ $editData['student']['name'] }}" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Nome do Pai<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="nfather" value="{{ $editData['student']['nfather'] }}" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Nome da Mãe<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text"  value="{{ $editData['student']['nmother'] }}" name="nmother" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                    </div><!--end 1nd row-->

                                                    <div class="row"><!--2nd row-->
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <h5>Tel. Celular<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" value="{{ $editData['student']['mobile'] }}" name="mobile" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>E-mail<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" value="{{ $editData['student']['email'] }}" name="email" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Endereço<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="adress" value="{{ $editData['student']['address'] }}" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <h5>Gênero<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="gender" id="gender" required class="form-control">
                                                                        <option value="">Selecione...</option>
                                                                        <option value="{{ $editData['student']['gender'] == "Masculino" ? "selected" : "" }}">Masculino</option>
                                                                        <option value="{{ $editData['student']['gender'] == "Feminino" ? "selected" : "" }}">Feminino</option>
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
                                                                        <option value="{{ $editData['student']['religion'] == "Evangélica" ? "selected" : "" }}">Evangélica</option>
                                                                        <option value="{{ $editData['student']['religion'] == "Católica" ? "selected" : "" }}">Católica</option>
                                                                        <option value="{{ $editData['student']['religion'] == "Espírita" ? "selected" : "" }}">Espírita</option>
                                                                        <option value="{{ $editData['student']['religion'] == "TJ" ? "selected" : "" }}">Testemunha de Jeová</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Data de Nascimento<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="date" value="{{ $editData['student']['dob'] }}" name="dob" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-md-4-->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Desconto<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" value="{{ $editData['discount']['discount'] }}" name="discount" class="form-control" required>
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
                                                                            <option value="{{ $editData->year_id == $year->id ? $year->id : ""  }}">{{ $year->name}}</option>    
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
                                                                            <option value="{{ $editData->group_id == $group->id ? $group->id : ""  }}">{{ $group->name}}</option>    
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
                                                                            <option value="{{ $editData->class_id == $class->id ? $class->id : ""  }}">{{ $class->name}}</option>    
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
                                                                            <option value="{{ $editData->shift_id == $shift->id ? $shift->id : ""  }}">{{ $shift->name}}</option>    
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
                                                                    <img id="showImage" src="{{ url(!empty($editData['student']['image']) ? url('upload/user_images/'.$editData['student']['image']) : url('upload/no_image.jpg')) }}" style="width: 100px; heigth: 100px;">
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
