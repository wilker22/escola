@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
        
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de Categorias de Taxas</h3>
                <a href="{{ route('fee.cat.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Cadastrar Categoria de Taxa</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Categoria de Taxa</th>
                              <th>Ações</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($cat as $key => $cat )
                          <tr>
                              <td style="width: 5%">{{ $key+1 }}</td>
                              <td>{{$cat->name}}</td>
                              <td style="width: 25%">
                                 <a href="{{ route('fee.cat.edit', $cat->id)}}" class="btn btn-info">Editar</a>
                                 <a href="{{ route('fee.cat.delete', $cat->id) }}" class="btn btn-danger" id="delete">Remover</a>
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