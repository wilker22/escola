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
                <h3 class="box-title">Detalhes de Valores de Taxas</h3>
                <a href="{{ route('fee.amount.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Cadastrar Valor de Taxa</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4><strong>Taxa - Categoria : </strong>{{ $detailsData['0']['fee_category']['name'] }} </h4>	
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th>SL</th>
                              <th>Turma</th>
                              <th width="25%">Valor R$</th>
                             
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($detailsData as $key => $detail )
                          <tr>
                              <td style="width: 5%">{{ $key+1 }}</td>
                              <td>{{ $detail['student_class']['name'] }}</td>
                              <td>{{ $detail->amount }}</td>
                             
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