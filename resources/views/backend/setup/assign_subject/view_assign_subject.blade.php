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
                <h3 class="box-title">Lista de Notas por Disciplina</h3>
                <a href="{{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Cadastrar Notas</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Turma</th>
                              <th>Ações</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $assign )
                          <tr>
                              <td style="width: 5%">{{ $key+1 }}</td>
                              <td>{{ $assign['student_class']['name'] }}</td>
                              <td style="width: 25%">
                                 <a href="{{ route('assign.subject.edit', $assign->class_id )}}" class="btn btn-info">Editar</a>
                                 <a href="{{ route('assign.subject.details', $assign->class_id )}}" class="btn btn-warning">Detalhes</a>
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