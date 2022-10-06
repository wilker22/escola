@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Gestão - <strong>Lucro Mensal/Anual</strong></h4>
                            </div>

                            <div class="box-body">


                                <div class="row">



                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Data Inicial <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="start_date" id="start_date" class="form-control">
                                            </div>

                                        </div>

                                    </div> <!-- End Col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Data Final <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="end_date" id="end_date" class="form-control">
                                            </div>

                                        </div>

                                    </div> <!-- End Col md 4 -->




                                    <div class="col-md-4" style="padding-top: 25px;">

                                        <a id="search" class="btn btn-primary" name="search"> Buscar</a>

                                    </div> <!-- End Col md 4 -->
                                </div><!--  end row -->


                                <!--  ////////////////// Registration Fee table /////////////  -->


                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="DocumentResults">

                                            <script id="document-template" type="text/x-handlebars-template">

 	<table class="table table-bordered table-striped" style="width: 100%">
 	<thead>
 		<tr>
        @{{ {
    thsource }}}
 		</tr>
 	 </thead>
 	 <tbody>

 	 	<tr>
 	 		@{{ {tdsource } }}
 	 	</tr>

 	 </tbody>
 	</table>
    </script>



                                        </div>
                                    </div>

                                </div>




                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>


    <script type="text/javascript">
        $(document).on('click', '#search', function() {
            var date = $('#start_date').val();
            var date = $('#end_date').val();
            $.ajax({
                url: "{{ route('report.profit.datewais.get') }}",
                type: "get",
                data: {
                    'start_date': start_date,
                    'end_date': end_date
                },
                beforeSend: function() {},
                success: function(data) {
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);
                    var html = template(data);
                    $('#DocumentResults').html(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });
    </script>
@endsection
