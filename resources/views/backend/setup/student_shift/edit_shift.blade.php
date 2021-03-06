@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Editar Turno</h4>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('student.shift.update', $shift->id) }}">
                                    @csrf

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Turno<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" value="{{ $shift->name}}" class="form-control">
                                                                
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
@endsection
