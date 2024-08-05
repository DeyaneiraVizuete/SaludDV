<?php
class Maternidad extends CI_Model{
        //constructor
        function __construct()
        {
            parent::__construct();
        }
        //Inserción de clientes en la bdd
        function insertar($datos){
            //primer parametro nombre de la tabla "cliente" segundo parametro lo que se quiere insertar "datos"
            $this->db->insert('maternidad',$datos);
        }
        //Consulta de todos los clientes
        function obtener(){
            $listadoMaternidades=$this->db->get('maternidad'); //es lo mismo que esto: select * from cliente 
            //Validando si existe datos en la tabla cliente
            if($listadoMaternidades-> num_rows()>0){
                return $listadoMaternidades->result(); //Retornamos el listado de clientes, en el caso que si existan
    
            }else{
                return false; //Cuando no existen clientes registrados
            }
        }
        //Eliminacion de datos
    function eliminarPorId($id){
        //delete from cliente where id_cli=3;
        $this->db->where('id_mat',$id);
        return $this->db->delete('maternidad');
    }
    //Consulta de un cliente especifico por su ID
    function consultarPorID($id){
        $this->db->where('id_mat',$id);//Select * from cliente where id_cli=6;
        $maternidades=$this->db->get('maternidad');
        //Validando que el cliente consultado exista en la bdd
        if($maternidades->num_rows()>0){
            return $maternidades->row(); //Cuando si existe el cliente
        }else{
            return false; //Cuando no existe el cliente
        }
    }
}
?>