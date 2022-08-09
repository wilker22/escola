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
                <h3 class="box-title">Lista de Funcionários</h3>
                <a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Cadastrar Funcionário</a>
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
                            @if(Auth::user()->role == "Admin")
                                <th>Código</th>
                            @endif
                            <th width="25%">Ações</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $employee )
                          <tr>
                            <td style="width: 5%">{{ $key+1 }}</td>
                            <td> {{ $employee->name }}</td>	
                            <td> {{ $employee->id_no }}</td>	
                            <td> {{ $employee->mobile }}</td>	
                            <td> {{ $employee->gender }}</td>	
                            <td> {{ date('d/m/Y', strtotime($employee->join_date)) }}</td>	
                            <td> R$ {{ $employee->salary }}</td>
                            @if(Auth::user()->role == "Admin")	
				                <td> {{ $employee->code }}</td>	
				            @endif		
                            <td style="width: 25%">
                                <a href="{{route('edit.employe.registration', $employee->id)}}" class="btn btn-info">Editar</a>
                                <a target="_blank" href="{{ route('details.employe.registration',$employee->id) }}" class="btn btn-danger">Ficha</a>
                                
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