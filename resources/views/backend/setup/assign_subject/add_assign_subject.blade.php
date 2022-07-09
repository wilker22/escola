@extends('admin.admin_master')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Cadastrar Notas para Disciplinas</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('assign.subject.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="add_item">
                                                <div class="form-group">
                                                    <h5>Notas<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="form-group">
                                                            <h5>Turma<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="class_id" id="select" required
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">
                                                                        Selecione a Turma...</option>
                                                                    @foreach ($classes as $class)
                                                                        <option value="{{ $class->id }}">
                                                                            {{ $class->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <h5>Disciplina<span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <select name="subject_id[]" id="select" required
                                                                            class="form-control">
                                                                            <option value="" selected=""
                                                                                disabled="">Selecione a Disciplina...</option>
                                                                            @foreach ($subjects as $subject)
                                                                                <option value="{{ $subject->id }}">
                                                                                    {{ $subject->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                           
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <h5>Nota Máxima<span class="text-danger">*</span>
                                                                        </h5>
                                                                        <div class="controls">
                                                                            <input type="text" name="full_mark[]"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <h5>Nota Média <span class="text-danger">*</span>
                                                                        </h5>
                                                                        <div class="controls">
                                                                            <input type="text" name="pass_mark[]"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <h5>Nota Subjetiva <span
                                                                                class="text-danger">*</span></h5>
                                                                        <div class="controls">
                                                                            <input type="text" name="subjective_mark[]"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2" style="padding-top: 25px ">
                                                                    <span class="btn btn-success addeventmore"><i
                                                                            class="fa fa-plus-circle"></i></span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                            </div>

                        </div>
                        <!--end add_item-->

                        <div class="text-xs-right">
                            <input type="submit" value="Cadastrar" class="btn btn-rounded btn-info mb-5">
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


    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Student Subject<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subject_id[]" id="select" required class="form-control">
                                <option value="" selected="" disabled="">Selecione...</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

               
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Nota Máxima<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="full_mark[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Nota Média <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="pass_mark[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Nota Subjetiva <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subjective_mark[]" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2" style="padding-top: 25px ">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                    </div>
                </div>

            </div>
            
        </div><!-- End col-md-2 -->




    </div>
    </div>
    </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", '.removeeventmore', function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });
        });
    </script>
@endsection
