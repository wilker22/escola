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
                <h3 class="box-title">Lista de Salários de Funcionários</h3>
                <a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Cadastrar Salário</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th width="5%">SL</th>  
                            <th>Nome</th> 
                            <th>ID Nº</th>
                            <th>Mobile</th>
                            <th>Gênero</th>
                            <th>Data de Adminissão</th>
                            <th>Salário</th>
                            
                            <th width="25%">Ações</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $value )
                          <tr>
                            <td style="width: 5%">{{ $key+1 }}</td>
                            <td> {{ $value->name }}</td>	
                            <td> {{ $value->id_no }}</td>	
                            <td> {{ $value->mobile }}</td>	
                            <td> {{ $value->gender }}</td>	
                            <td> {{ date('d/m/Y', strtotime($value->join_date)) }}</td>	
                            <td> R$ {{ $value->salary }}</td>
                            	
                            <td style="width: 25%">
                                <a title="Incrementar" href="{{route('employee.salary.increment', $value->id)}}" class="btn btn-info"><i class="fa fa-plus-circle"></i></a>
                                <a title="Detalhes" target="_blank" href="{{ route('employee.salary.details',$value->id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>
                                
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