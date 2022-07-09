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
                <h3 class="box-title">Disciplinas / Notas</h3>
                <a href="{{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Cadastrar Notas</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4><strong>Disciplinas/ Notas : </strong>{{ $detailsData['0']['student_class']['name'] }} </h4>	
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">SL</th>
                              <th width="20%">Disciplina</th>
                              <th width="20%">Nota Máxima</th>
                              <th width="20%">Nota Média</th>
                              <th width="20%">Nota Subjetiva</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($detailsData as $key => $detail )
                          <tr>
                              <td style="width: 5%">{{ $key+1 }}</td>
                              <td>{{ $detail['school_subject']['name'] }}</td>
                              <td>{{ $detail->full_mark }}</td>
                              <td>{{ $detail->pass_mark }}</td>
                              <td>{{ $detail->subjective_mark }}</td>
                             
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