<?php
class Hospital extends CI_Model{
        //constructor
        function __construct()
        {
            parent::__construct();
        }
        //Inserción de clientes en la bdd
        function insertar($datos){
            //primer parametro nombre de la tabla "cliente" segundo parametro lo que se quiere insertar "datos"
            $this->db->insert('hospital',$datos);
        }
        //Consulta de todos los clientes
        function obtener(){
            $listadoHospitales=$this->db->get('hospital'); //es lo mismo que esto: select * from cliente 
            //Validando si existe datos en la tabla cliente
            if($listadoHospitales-> num_rows()>0){
                return $listadoHospitales->result(); //Retornamos el listado de clientes, en el caso que si existan
    
            }else{
                return false; //Cuando no existen clientes registrados
            }
        }
        //Eliminacion de datos
    function eliminarPorId($id){
        //delete from cliente where id_cli=3;
        $this->db->where('id_hos',$id);
        return $this->db->delete('hospital');
    }
    //Consulta de un cliente especifico por su ID
    function consultarPorID($id){
        $this->db->where('id_hos',$id);//Select * from cliente where id_cli=6;
        $hospitales=$this->db->get('hospital');
        //Validando que el cliente consultado exista en la bdd
        if($hospitales->num_rows()>0){
            return $hospitales->row(); //Cuando si existe el cliente
        }else{
            return false; //Cuando no existe el cliente
        }
    }
}
?>