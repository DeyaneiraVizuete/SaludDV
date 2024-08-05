<?php
    class Hospitales extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Hospital');
        }
       
        public function registroHospital(){
            $hospitales=$this->Hospital->obtener();
            //Para pasar datos a la vista
            $data['hospitales']=$hospitales; //OJO
            //Relacionar con el index
            $this->load->view('header');
            $this->load->view('Hospitales/registroHospital',$data);
            $this->load->view('footer');   
        }
           //Funcion para recibir datos del cliente y guardar en la bdd
           public function guardar(){
            //para declarar variables se utiliza el signo de dolar
            $datos=array(
                'nombre_hos'=>$this->input->post('nombre_hos'),
                'telefono_hos' =>$this->input->post('telefono_hos'),
                'email_hos'=>$this->input->post('email_hos'),
                'numero_consultorio_hos'=>$this->input->post('numero_consultorio_hos'),
                'numero_medicos_hos'=>$this->input->post('numero_medicos_hos'),
                'tipo_hos'=>$this->input->post('tipo_hos'),
                'latitud_hos'=>$this->input->post('latitud_hos'),
                'longitud_hos'=>$this->input->post('longitud_hos')
            );   
            //print_r($datos);
            $this->Hospital->insertar($datos);
            redirect('Hospitales/registroHospital');
        }
        //Funcion para eliminar clientes se recibe el ID
        public function eliminar($id){
            if($this->Hospital->eliminarPorID($id)){
                redirect('Hospitales/registroHospital');
            }else{
                echo "Error al eliminar";
            }
        }
        //Funcion para graficar la direccion de un cliente en el mapa
        public function graficarDireccion($id){
            $data['hospital']=$this->Hospital->consultarPorID($id);
            $this->load->view('header');
            $this->load->view('Hospitales/graficarDireccion',$data);
            $this->load->view('footer');
        }
        public function reporteHospital(){
            $data['hospitales']=$this->Hospital->obtener();
            $this->load->view('header');
            $this->load->view('Hospitales/reporteHospital',$data);
            $this->load->view('footer');
        }
    }
?>

