<?php
     /*
    Programacion orientada a objetos POO ************************************************************************
    */

    class Coche{
        //Los atributos de clase van precedidos de la palabra var 
        protected $ruedas;
        var $color;
        protected $motor;

        //Constructor de la clase: se encarga de dar un estado incial a la clase *(en esta version de php el constructor se define __construct())
        function  __construct(){
            $this->ruedas=4;
            $this->color="";
            $this->motor=1600;
        }

        //Las clases tiene funciones estas funciones realizan acciones propias del objeto que se crea 
        //En este caso un coche puede arrancar, frenar, acelerar etc...
        function arrancar(){
            echo "Estoy arrancando <br>";
        }

        function frenar(){
            echo "Estoy frenando <br>";
        }

        function girar(){
            echo "Estoy girando <br>";
        }

        //getter and setter --------
        function get_ruedas(){
            return $this->ruedas;
        }

        function set_Color($color_coche){
            $this->color=$color_coche;
            echo "El color del coche es: " . $this->color . "<br>";
        }

        function get_motor(){
            return $this->motor;
        }
    }

    //**************************************************************************************** */
    //Al heredar de la clase coche ya tenemos dentro de la clase camion todas los atributos de coche mas todos los metodos de coche 
    class Camion extends Coche{

        //Constructor de la clase: se encarga de dar un estado incial a la clase *(en esta version de php el constructor se define __construct())
        function  __construct(){
            $this->ruedas=8;
            $this->color="";
            $this->motor=2600;
        }

        //Sobrescritura de metodo pero adecuado para camion 
        function estableceColor($color_camion){
            $this->color=$color_camion;
            echo "El color del coche es: " . $this->color . "<br>";
        }

        //Con los dos puntos (::) le decimos que en este metodo arrancar de la clase camion lo primero 
        //que tiene que hacer es ejecutar todo el metodo arrancar de la clase padre y despues le agregas 
        //lo que quieras de la clase arrancar de camion 
        function arrancar(){
            //Primero ejecuta arrancar de la clase padre 
            parent::arrancar();
            //Despues ejecuta lo especifico de camion 
            echo "Camion arrancado";
        }

    }

    //******************************************************************************************* */
    /*
    class Vehiculo{
        public $ruedas;
        public $puertas;

        public function __construct($ruedas,$puertas){
            $this->ruedas=$ruedas;
            $this->puertas=$puertas;
        } 

        public function pinta(){
            echo "Las ruedas del vehiculo son: " . $this->ruedas . "<br>";
            echo "Las puertas del vehiculo son: " . $this->puertas . "<br>";
        }
    }
    */
    //*******************************************************************************************+ */
    class Compra_vehiculo{
		
		private $precio_base;
        //Al crear el campo estatico ya no pertenece a ningun objeto solamente a la clase 
		private static $ayuda=0;
				
		function __construct($gama){

			if($gama=="urbano"){				
				$this->precio_base=10000;				
			}else if($gama=="compacto"){								
				$this->precio_base=20000;					
			}			
			else if($gama=="berlina"){				
				$this->precio_base=30000;					
			}			
		}// fin constructor
		
        //Funciones de la clase 
        static function descuento_gobierno(){
            self::$ayuda=4500;
        }

		function climatizador(){							
			$this->precio_base+=2000;										
		}// fin climatizador
				
		function navegador_gps(){			
			$this->precio_base+=2500;				
		}//fin navegador gps
			
		function tapiceria_cuero($color){	
			if($color=="blanco"){
				$this->precio_base+=3000;
			}			
			else if($color=="beige"){				
				$this->precio_base+=3500;				
			}			
			else{				
				$this->precio_base+=5000;				
			}
			
		}// fin tapicería

		function precio_final(){			
			$valor_final=$this->precio_base-self::$ayuda;			
			return $valor_final;				
		}// fin precio final
	}// fin clase



?>