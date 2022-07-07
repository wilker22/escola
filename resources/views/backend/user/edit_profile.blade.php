@extends('admin.admin_master')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


@section('admin')
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Editar Perfil</h4>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                                    @csrf
                                   

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Nome do Usuário<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" value="{{ $userEdit->name }}" class="form-control"
                                                                required="">
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>E-mail do Usuário<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" value="{{ $userEdit->email }}" class="form-control"
                                                                required="">
                                                        </div>
                                                       
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-12">
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Telefone Celular<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" value="{{ $userEdit->mobile }}" class="form-control"
                                                                required="">
                                                        </div>
                                                       
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Endereço<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" value="{{ $userEdit->address }}" class="form-control"
                                                                required="">
                                                        </div>
                                                       
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end row-->

                                           
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-12">
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Gênero<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="select" required
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Selecione...</option>
                                                                <option value="Male" {{ $userEdit->gender = "Male" ? "selected" : "" }}>Masculino</option>
                                                                <option value="Female" {{ $userEdit->usertype = "Female" ? "selected" : "" }}>Feminino</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Imagem do Perfil<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input id="image" type="file" name="image" required class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end row-->

                                           
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-12">
                                            
                                            <div class="row">

                                                <div class="col-md-6">
                                                    
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage" src="{{ url(!empty($userEdit->image) ? url('upload/user_images/'.$userEdit->image) : url('upload/no_image.jpg')) }}" style="width: 100px; heigth: 100px;">
                                                        </div>
                                                    </div>
                                                </div>

                                               

                                            </div>
                                            <!--end row-->

                                           
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" value="Atualizar" class="btn btn-rounded btn-info mb-5">
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
