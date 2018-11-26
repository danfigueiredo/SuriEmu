<?php
	class ShakaiHokenService implements ServiceImpl {

		public function save($shakaiHoken) {
			$repository = new ShakaiHokenRepository();
			$repository->save($shakaiHoken);
		}

		public function remove($id) {
			$repository = new ShakaiHokenRepository();
			$repository->remove($id);
		}

		public function findById($id) {
			$repository = new ShakaiHokenRepository();
			return $repository->findById($id);
		}

		public function findAll() {
			$repository = new ShakaiHokenRepository();
			return $repository->findAll();
		}
	}
?>