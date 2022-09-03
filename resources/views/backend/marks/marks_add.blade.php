@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Aluno - <strong> Notas</strong></h4>
                            </div>
                            <div class="box-body">
                                <form method="POST" action="{{ route('marks.entry.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Ano <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Selecione o Ano
                                                        </option>
                                                        @foreach ($years as $year)
                                                            <option value="{{ $year->id }}"> {{ $year->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->




                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Turma <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="class_id" id="class_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Selecione a
                                                            Turma
                                                        </option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">
                                                                {{ $class->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->

                                        
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Disciplinas <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="assign_subject_id" id="assign_subject_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">
                                                            Selecione...                                                            
                                                        </option>
                                                       

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Tipo de Prova <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="exam_type_id" id="exam_type_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">
                                                            Selecione...
                                                        </option>
                                                        @foreach ($exam_types as $exam)
                                                            <option value="{{ $exam->id }}">
                                                                {{ $exam->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->


                                        <div class="col-md-3">

                                            <a id="search" class="btn btn-primary" name="search">Buscar</a>


                                        </div> <!-- End Col md 4 -->

                                    </div><!--  end row -->

                                    <!--//////////////Marks Table //////////////////-->
                                    <div class="row d-none" id="marks-entry">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID Nº</th>
                                                        <th>Nome do Aluno</th>
                                                        <th>Pai</th>
                                                        <th>Gênero</th>
                                                        <th>Notas</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="marks-entry-tr">

                                                </tbody>

                                            </table>

                                            <input type="submit" class="btn btn-rounded btn-primary" value="Cadastrar">
                                        </div>
                                    </div>

                                 

                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>

    // Start Roll Generated ===========

    <script type="text/javascript">
        $(document).on('click', '#search', function() {
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var assign_subject_id = $('#assign_subject_id').val();
            var exam_type_id = $('#exam_type_id').val();
            $.ajax({
                url: "{{ route('student.marks.getstudents') }}",
                type: "GET",
                data: {
                    'year_id': year_id,
                    'class_id': class_id
                },
                success: function(data) {
                    $('#marks-entry').removeClass('d-none');
                    var html = '';
                    $.each(data, function(key, v) {
                        html +=
                            '<tr>' +
                            '<td>' + v.student.id_no +
                            '<input type="hidden" name="student_id[]" value="' + v.student_id +
                            '"><input type ="hidden" name="id_no[]" value="'+v.student.id_no+'"</td>' +
                            '<td>' + v.student.name + '</td>' +
                            '<td>' + v.student.fname + '</td>' +
                            '<td>' + v.student.gender + '</td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="marks[]"></td>' +
                            '</tr>';
                    });
                    html = $('#marks-entry-tr').html(html);
                }
            });
        });
    </script>

  ============ End Script Roll Generate =================

  <!-========================-  Load class by subject ====================== -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#class_id',function(){
      var class_id = $('#class_id').val();
      $.ajax({
        url:"{{ route('marks.getsubject') }}",
        type:"GET",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Selecione...</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    });
  });
</script>
<!-========================-End  Load class by subject ====================== -->
@endsection