<script type="text/javascript">
	function redirect (target) {
		window.location.href = '/SuriEmu/' + target;	
	}

	document.getElementById("suriemu").src = window.location.origin + "/SuriEmu/img/suriemu.png";
</script>
<header>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
				
			<div class="navbar-header">
				<a class="navbar-brand" rel="home" href="" title="SURI-EMU">
			        <img id="suriemu" src="">
			    </a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href=''>Home</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href=''>
						Cadastros <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a onclick="redirect('funcionario')" href=''>Funcionarios</a></li>
						<li><a onclick="redirect('tipoFuncionario')" href=''>Tipos de Funcionario</a></li>
						<li><a onclick="redirect('absenteismo')" href=''>Absenteismos</a></li>
						<li><a onclick="redirect('desconto')" href=''>Descontos</a></li>
						<li><a onclick="redirect('shakaiHoken')" href=''>Shakai Hoken</a></li>
						<li><a onclick="redirect('departamento')" href=''>Departamentos</a></li>
						<li><a onclick="redirect('setor')" href=''>Setores</a></li>
						<li><a onclick="redirect('custo')" href=''>Custos</a></li>
						<li><a onclick="redirect('orcamento')" href=''>Orçamentos</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href=''>
						Relatórios<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href=''>Orçamento</a></li>
						<li><a href=''>Cobrança</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>