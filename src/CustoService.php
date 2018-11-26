<?php
	class CustoService implements ServiceImpl {

		public function save($custo) {
			$repository = new CustoRepository();
			$repository->save($custo);
		}

		public function remove($id) {
			$repository = new CustoRepository();
			$repository->remove($id);
		}

		public function findById($id) {
			$repository = new CustoRepository();
			return $repository->findById($id);
		}

		public function findAll() {
			$repository = new CustoRepository();
			return $repository->findAll();
		}
	}
?>