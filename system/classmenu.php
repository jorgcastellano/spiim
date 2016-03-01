<?php
	class menu{
		private $icono = array();
		private $direccion = array();
		private $nombre = array();

		public function cargarElemento($icon, $dir , $nom){
			$this->icono[] = $icon;
			$this->direccion[] = $dir;
			$this->nombre[] = $nom;
		}

		public function mostrar(){
			$arreglo = array();
			for ($i=0; $i < count($this->nombre); $i++ ) { 
            	$arreglo[$i] = '<li>
            						<a href="'.$this->direccion[$i].'">
            							<i class="fa '.$this->icono[$i].' fa-fw"></i>'.$this->nombre[$i].'
            						</a>';
			}
			return $arreglo;
		}
	}

	class controladorMenu{
		private $direcc;
		private $name;

		public function menuHome(){
			$menuh = new menu();
			$menuh->cargarElemento("fa-home", "../home/inicio", "Inicio");
            return $menuh->mostrar();
        }

		public function cerrar_sesion(){
			$menuh = new menu();
			$menuh->cargarElemento("fa-sign-out", "../../0/home/cerrar_sesion", "");
            return $menuh->mostrar();
		}
		public function menuNivel13() {
			$elementos = new menu();
			$elementos->cargarElemento("fa-money", "../../0/home/inicio", " Facturas impagas");
			$elementos->cargarElemento("fa-search", "../../0/producto/inve", " Inventario");
			$elementos->cargarElemento("fa-bar-chart", "../../0/caja/estadistica", " Estadísticas");
			$elementos->cargarElemento("fa-gift", "../../0/producto/index", " Nuevos productos");

			return $elementos -> mostrar();
		}

		public function menuNivel1(){ 
			$elementos = new menu();
			$elementos->cargarElemento("fa-star-o", "#", " Servicios");
			$elementos->cargarElemento("fa-shopping-cart", "#", " Productos");
			$elementos->cargarElemento("fa-bar-chart", "#", " Estadísticas");
			$elementos->cargarElemento("fa-gear", "#", " Administración");

			return $elementos -> mostrar();
		}
		public function menuNivel2($xa){
			$subElementos = new menu();
			switch ($xa) {
				case 0:
					$subElementos->cargarElemento("fa-check-square-o", "../../0/home/estatus", " Activar/Desactivar");
					$subElementos->cargarElemento("fa-bug", "../../0/analisis/index", " Análisis");
					return $subElementos->mostrar();
					break;
				case 1:
					$subElementos->cargarElemento("fa-search", "../../0/producto/inve", " Inventario");
					$subElementos->cargarElemento("fa-gift", "../../0/producto/index", " Nuevos productos");
					return $subElementos->mostrar();
					break;
				
				case 3:
					$subElementos->cargarElemento("fa-list", "../../0/home/gestion_usuario", " Gestion de usuarios");
					$subElementos->cargarElemento("fa-cloud-download", "../../includes/respaldo", " Respaldar");
					$subElementos->cargarElemento("fa-cloud-upload", "#", " Restaurar");
					return $subElementos->mostrar();
					break;
			}
		}
	}
?>