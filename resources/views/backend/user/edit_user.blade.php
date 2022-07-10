@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Editar Usuário</h4>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('user.update', $user->id) }}">
                                    @csrf
                                   

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Perfil do Usuário <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="role" id="select" required
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Selecione um perfil...</option>
                                                                <option value="Admin" {{ $user->role = "Admin" ? "selected" : "" }}>Admin</option>
                                                                <option value="Operador" {{ $user->role = "Operador" ? "selected" : "" }}>Operador</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <h5>Nome do Usuário<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name"  value="{{ $user->name }}" class="form-control"
                                                                required="">
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end row-->

                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>E-mail do Usuário<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                                                required="">
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            

                                                <div class="col-md-6">
                                                    
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
@endsection
