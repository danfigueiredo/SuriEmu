<?php
	class DepartamentoService implements ServiceImpl {

		public function save($departamento) {
			$repository = new DepartamentoRepository();
			$repository->save($departamento);
		}

		public function remove($id) {
			$repository = new DepartamentoRepository();
			$repository->remove($id);
		}

		public function findById($id) {
			$repository = new DepartamentoRepository();
			return $repository->findById($id);
		}

		public function findAll() {
			$repository = new DepartamentoRepository();
			return $repository->findAll();
		}
	}
?>