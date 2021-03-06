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
                <h3 class="box-title">Lista de Anos</h3>
                <a href="{{ route('student.year.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Cadastrar Ano</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Ano</th>
                              <th>Ações</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $key => $ano )
                          <tr>
                              <td style="width: 5%">{{ $key+1 }}</td>
                              <td>{{$ano->name}}</td>
                              <td style="width: 25%">
                                 <a href="{{ route('student.year.edit', $ano->id)}}" class="btn btn-info">Editar</a>
                                 <a href="{{ route('student.year.delete', $ano->id) }}" class="btn btn-danger" id="delete">Remover</a>
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