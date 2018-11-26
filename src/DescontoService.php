<?php
	class DescontoService implements ServiceImpl {

		public function save($desconto) {
			$repository = new DescontoRepository();
			$repository->save($desconto);
		}

		public function remove($id) {
			$repository = new DescontoRepository();
			$repository->remove($id);
		}

		public function findById($id) {
			$repository = new DescontoRepository();
			return $repository->findById($id);
		}

		public function findByIdFuncionario($idFuncionario) {
			$repository = new DescontoRepository();
			return $repository->findByIdFuncionario($idFuncionario);
		}

		public function findAll() {
			$repository = new DescontoRepository();
			return $repository->findAll();
		}
	}
?>