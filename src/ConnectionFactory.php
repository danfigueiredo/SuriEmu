<?php
	class ConnectionFactory {

		public static function getConnection() {

			try {
				return new \mysqli("localhost", "root", "vertrigo", "suri_emu");
			} catch (mysqli_sql_exception $e) {
				throw new Exception($e->getMessage());
			}
		}
	}
?>