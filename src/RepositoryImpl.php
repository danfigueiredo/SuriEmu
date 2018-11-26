<?php
	interface RepositoryImpl {
		
		public function save($obj);
		public function remove($id);
		public function findById($id);
		public function findAll();
	}
?>