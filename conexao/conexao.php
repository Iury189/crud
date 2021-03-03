<?php  

	require_once '../conexao/config.php';

	class BD {
		
		private static $instancia;

		public static function getInstance() {

			if (!isset(self::$instance)) {

				try {

					self::$instancia = new PDO('mysql:host=' . HOST . '; dbname=' . BASE, USER, PASS);
					self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

				} catch (PDOException $e) {
					echo $e->getMessage();
				}
			}
			return self::$instancia;
		}

		public static function prepare($sql) {

			return self::getInstance()->prepare($sql);
			
		}
	}
?>