<?php
    class Clinicas extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Clinica');
        }
       
        public function registro(){
            $clinicas=$this->Clinica->obtener();
            //Para pasar datos a la vista
            $data['clinicas']=$clinicas; //OJO
            //Relacionar con el index
            $this->load->view('header');
            $this->load->view('Clinicas/registro',$data);
            $this->load->view('footer');   
        }
           //Funcion para recibir datos del cliente y guardar en la bdd
           public function guardar(){
            //para declarar variables se utiliza el signo de dolar
            $datos=array(
                'nombre_cli'=>$this->input->post('nombre_cli'),
                'telefono_cli' =>$this->input->post('telefono_cli'),
                'email_cli'=>$this->input->post('email_cli'),
                'latitud_cli'=>$this->input->post('latitud_cli'),
                'longitud_cli'=>$this->input->post('longitud_cli')
            );   
            //print_r($datos);
            $this->Clinica->insertar($datos);
            redirect('Clinicas/registro');
        }
        //Funcion para eliminar clientes se recibe el ID
        public function eliminar($id){
            if($this->Clinica->eliminarPorID($id)){
                redirect('Clinicas/registro');
            }else{
                echo "Error al eliminar";
            }
        }
        //Funcion para graficar la direccion de un cliente en el mapa
        public function graficarDireccion($id){
            $data['clinica']=$this->Clinica->consultarPorID($id);
            $this->load->view('header');
            $this->load->view('Clinicas/graficarDireccion',$data);
            $this->load->view('footer');
        }
        public function reporte(){
            $data['clinicas']=$this->Clinica->obtener();
            $this->load->view('header');
            $this->load->view('Clinicas/reporte',$data);
            $this->load->view('footer');
        }
    }
?>