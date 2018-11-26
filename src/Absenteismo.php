<?php
	
	class Absenteismo implements JsonSerializable {
		
		private $id;
		private $data;
		private $horas;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getData() {
			return $this->data;
		}

		public function setData($data) {
			$this->data = $data;
		}

		public function getHoras() {
			return $this->horas;
		}

		public function setHoras($horas) {
			$this->horas = $horas;
		}

		public function createObjectByPost($post) {
			$this->id = $post["id"];
			$this->data = $post["data"];
			$this->horas = $post["horas"];

			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}
	}

?>