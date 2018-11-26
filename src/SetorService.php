<?php
	class SetorService implements ServiceImpl {

		public function save($setor) {
			$repository = new SetorRepository();
			$repository->save($setor);
		}

		public function remove($id) {
			$repository = new SetorRepository();
			$repository->remove($id);
		}

		public function findById($id) {
			$repository = new SetorRepository();
			return $repository->findById($id);
		}

		public function findAll() {
			$repository = new SetorRepository();
			return $repository->findAll();
		}
	}
?>