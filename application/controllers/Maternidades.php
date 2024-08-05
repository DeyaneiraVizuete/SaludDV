<?php
    class Maternidades extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Maternidad');
        }
       
        public function registroMaternidad(){
            $maternidades=$this->Maternidad->obtener();
            //Para pasar datos a la vista
            $data['maternidades']=$maternidades; //OJO
            //Relacionar con el index
            $this->load->view('header');
            $this->load->view('Maternidades/registroMaternidad',$data);
            $this->load->view('footer');   
        }
           //Funcion para recibir datos del cliente y guardar en la bdd
           public function guardar(){
            //para declarar variables se utiliza el signo de dolar
            $datos=array(
                'nombre_mat'=>$this->input->post('nombre_mat'),
                'telefono_mat' =>$this->input->post('telefono_mat'),
                'email_mat'=>$this->input->post('email_mat'),
                'capacidad_mat'=>$this->input->post('capacidad_mat'),
                'latitud_mat'=>$this->input->post('latitud_mat'),
                'longitud_mat'=>$this->input->post('longitud_mat')
            );   
            //print_r($datos);
            $this->Maternidad->insertar($datos);
            redirect('Maternidades/registroMaternidad');
        }
        //Funcion para eliminar clientes se recibe el ID
        public function eliminar($id){
            if($this->Maternidad->eliminarPorID($id)){
                redirect('Maternidades/registroMaternidad');
            }else{
                echo "Error al eliminar";
            }
        }
        //Funcion para graficar la direccion de un cliente en el mapa
        public function graficarDireccion($id){
            $data['maternidad']=$this->Maternidad->consultarPorID($id);
            $this->load->view('header');
            $this->load->view('Maternidades/graficarDireccion',$data);
            $this->load->view('footer');
        }
        public function reporteMaternidad(){
            $data['maternidades']=$this->Maternidad->obtener();
            $this->load->view('header');
            $this->load->view('Maternidades/reporteMaternidad',$data);
            $this->load->view('footer');
        }
    }
?>