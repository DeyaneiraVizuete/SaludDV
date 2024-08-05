<?php
class Clinica extends CI_Model{
        //constructor
        function __construct()
        {
            parent::__construct();
        }
        //Inserción de clientes en la bdd
        function insertar($datos){
            //primer parametro nombre de la tabla "cliente" segundo parametro lo que se quiere insertar "datos"
            $this->db->insert('clinica',$datos);
        }
        //Consulta de todos los clientes
        function obtener(){
            $listadoClinicas=$this->db->get('clinica'); //es lo mismo que esto: select * from cliente 
            //Validando si existe datos en la tabla cliente
            if($listadoClinicas-> num_rows()>0){
                return $listadoClinicas->result(); //Retornamos el listado de clientes, en el caso que si existan
    
            }else{
                return false; //Cuando no existen clientes registrados
            }
        }
        //Eliminacion de datos
    function eliminarPorId($id){
        //delete from cliente where id_cli=3;
        $this->db->where('id_cli',$id);
        return $this->db->delete('clinica');
    }
    //Consulta de un cliente especifico por su ID
    function consultarPorID($id){
        $this->db->where('id_cli',$id);//Select * from cliente where id_cli=6;
        $clinicas=$this->db->get('clinica');
        //Validando que el cliente consultado exista en la bdd
        if($clinicas->num_rows()>0){
            return $clinicas->row(); //Cuando si existe el cliente
        }else{
            return false; //Cuando no existe el cliente
        }
    }
}
?>