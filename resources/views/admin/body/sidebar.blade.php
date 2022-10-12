@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp



<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{ asset('images/logo-dark.png') }}" alt="">
						  <h3><b>Escola</b> WTech</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{ $route == 'dashboard' ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        @if(Auth::user()->role == 'Admin')
          <li class="treeview {{ $prefix == '/users' ? 'active' : '' }}">
            <a href="#">
              <i data-feather="user"></i>
              <span>Gerenciar Usuários</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>Lista de Usuários</a></li>
              <li><a href="{{ route('user.add') }}"><i class="ti-more"></i>Cadastrar Usuários</a></li>
            </ul>
          </li>
        @endif

        <li class="treeview {{ $prefix == '/profile' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="info"></i> <span>Gerenciar Perfil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Seu Perfil</a></li>
            <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Gerenciamento de Senha</a></li>

          </ul>
        </li>

        <li class="treeview {{ $prefix == '/setups' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="settings"></i> <span>Configurações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Turmas</a></li>
            <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Anos</a></li>
            <li><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Cursos</a></li>
            <li><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Turnos</a></li>
            <li><a href="{{ route('fee.cat.view') }}"><i class="ti-more"></i>Taxas - Categorias</a></li>
            <li><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Taxas - Valores R$</a></li>
            <li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exames(Provas) - Tipos</a></li>
            <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Disciplinas</a></li>
            <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Atribuir Notas às Disciplinas</a></li>
            <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Funções</a></li>

          </ul>
        </li>

        <li class="treeview {{ $prefix == '/students' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="user-check"></i> <span>Gerenciar Alunos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Cadastro de Alunos</a></li>
            <li><a href="{{ route('student.generate.roll') }}"><i class="ti-more"></i>Gerar Lista de Alunos</a></li>
            <li><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Taxa de Matrícula</a></li>
            <li><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Taxa de Mensalidade</a></li>
            <li><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Taxa de Exames(Provas/testes)</a></li>


          </ul>
        </li>

        <li class="treeview {{ $prefix == '/eployees' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="user-check"></i> <span>Gerenciar Funcionários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'employee.view' ? 'active' : '' }}><a href="{{ route('employee.view') }}"><i class="ti-more"></i>Cadastrar Funcionários</a></li>
            <li class="{{ $route == 'employee.salary.view' ? 'active' : '' }}><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Salário</a></li>
            <li class="{{ $route == 'employee.leave.view' ? 'active' : '' }}><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Licensas</a></li>
            <li class="{{ $route == 'employee.attendance.view' ? 'active' : '' }}><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Comparecimento</a></li>
            <li class="{{ $route == 'employee.monthly.salary' ? 'active' : '' }}><a href="{{ route('employee.monthly.salary') }}"><i class="ti-more"></i>Salário Mensal</a></li>


          </ul>
        </li>

        <li class="treeview {{ $prefix == '/marks' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="user-check"></i> <span>Gerenciar Notas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'marks.entry.add' ? 'active' : '' }}"><a href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Cadastrar Notas</a></li>
            <li class="{{ $route == 'marks.entry.edit' ? 'active' : '' }}"><a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Editar Notas</a></li>
            <li class="{{ $route == 'marks.entry.grade' ? 'active' : '' }}"><a href="{{ route('marks.entry.grade') }}"><i class="ti-more"></i>Grade de Notas</a></li>



          </ul>
        </li>

        <li class="treeview {{ $prefix == '/accounts' ? 'active' : '' }}">
            <a href="#">
              <i data-feather="user-check"></i> <span>Financeiro</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ $route == 'student.fee.view' ? 'active' : '' }}"><a href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Alunos - Pagamentos</a></li>
              <li class="{{ $route == 'account.salary.view' ? 'active' : '' }}"><a href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Colaboradores - Salários</a></li>
              <li class="{{ $route == 'account.salary.view' ? 'active' : '' }}"><a href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Outros Custos</a></li>
            </ul>
          </li>




        <li class="header nav-small-cap">Relatórios</li>

        <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }}">
            <a href="#">
              <i data-feather="user-check"></i> <span>Relatórios de Gestão</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'monthly.profit.view')?'active':'' }}"><a href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Lucro - Mensal/Anula</a></li>
                <li class="{{ ($route == 'marksheet.generate.view')?'active':'' }}"><a href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>Boletim de Notas</a></li>
                <li class="{{ ($route == 'attendance.report.view')?'active':'' }}"><a href="{{ route('attendance.report.view') }}"><i class="ti-more"></i>Relatório de Comparecimento</a></li>


            </ul>
          </li>





      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
