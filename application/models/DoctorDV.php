<?php
class DoctorDV extends CI_Model{
        //constructor
        function __construct()
        {
            parent::__construct();
        }
        //Inserción de clientes en la bdd
        function insertar($datos){
            //primer parametro nombre de la tabla "cliente" segundo parametro lo que se quiere insertar "datos"
            $this->db->insert('doctordv',$datos);
        }
        //Consulta de todos los clientes
        function obtener(){
            $listadoDoctoresDV=$this->db->get('doctordv'); //es lo mismo que esto: select * from cliente 
            //Validando si existe datos en la tabla cliente
            if($listadoDoctoresDV-> num_rows()>0){
                return $listadoDoctoresDV->result(); //Retornamos el listado de clientes, en el caso que si existan
    
            }else{
                return false; //Cuando no existen clientes registrados
            }
        }
        //Eliminacion de datos
    function eliminarPorId($id_doc_dv){
        //delete from cliente where id_cli=3;
        $this->db->where('id_doc_dv',$id_doc_dv);
        return $this->db->delete('doctordv');
    }
    //Consulta de un cliente especifico por su ID
    function consultarPorID($id_doc_dv){
        $this->db->where('id_doc_dv',$id_doc_dv);//Select * from cliente where id_cli=6;
        $clinicas=$this->db->get('doctordv');
        //Validando que el cliente consultado exista en la bdd
        if($clinicas->num_rows()>0){
            return $clinicas->row(); //Cuando si existe el cliente
        }else{
            return false; //Cuando no existe el cliente
        }
    }
}
?>