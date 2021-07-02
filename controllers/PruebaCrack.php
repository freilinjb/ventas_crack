<?php 

class PruebaCrack {
    
    static public function prueba()  {

        if(isset($_POST['nombre'])) {

            print_r($_POST);

            PruebaModel::prueba();
        }
    }  
}