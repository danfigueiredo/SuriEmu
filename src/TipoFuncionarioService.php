<?php
	class TipoFuncionarioService implements ServiceImpl {

		public function save($tipoFuncionario) {
			$repository = new TipoFuncionarioRepository();
			$repository->save($tipoFuncionario);
		}

		public function remove($id) {
			$repository = new TipoFuncionarioRepository();
			$repository->remove($id);
		}

		public function findById($id) {
			$repository = new TipoFuncionarioRepository();
			return $repository->findById($id);
		}

		public function findAll() {
			$repository = new TipoFuncionarioRepository();
			return $repository->findAll();
		}
	}
?>