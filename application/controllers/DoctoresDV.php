<?php
    class DoctoresDV extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('DoctorDV');
        }
       
        public function registroDoctorDV(){
            $doctoresdv=$this->DoctorDV->obtener();
            //Para pasar datos a la vista
            $data['doctoresdv']=$doctoresdv; //OJO
            //Relacionar con el index
            $this->load->view('header');
            $this->load->view('DoctoresDV/registroDoctorDV',$data);
            $this->load->view('footer');   
        }
           //Funcion para recibir datos del cliente y guardar en la bdd
           public function guardar(){
            //para declarar variables se utiliza el signo de dolar
            $datos=array(
                'dni_doc_dv'=>$this->input->post('dni_doc_dv'),
                'apellido_doc_dv' =>$this->input->post('apellido_doc_dv'),
                'nombre_doc_dv'=>$this->input->post('nombre_doc_dv'),
                'latitud_doc_dv'=>$this->input->post('latitud_doc_dv'),
                'longitud_doc_dv'=>$this->input->post('longitud_doc_dv'),
                'especialidad_doc_dv'=>$this->input->post('especialidad_doc_dv')
            );   
            //print_r($datos);
            $this->DoctorDV->insertar($datos);
            redirect('DoctoresDV/registroDoctorDV');
        }
        //Funcion para eliminar clientes se recibe el ID
        public function eliminar($id){
            if($this->DoctorDV->eliminarPorID($id)){
                redirect('DoctoresDV/registroDoctorDV');
            }else{
                echo "Error al eliminar";
            }
        }
        //Funcion para graficar la direccion de un cliente en el mapa
        public function graficarDireccion($id){
            $data['doctordv']=$this->DoctorDV->consultarPorID($id);
            $this->load->view('header');
            $this->load->view('DoctoresDV/graficarDireccion',$data);
            $this->load->view('footer');
        }
        public function reporteDoctorDV(){
            $data['doctoresdv']=$this->DoctorDV->obtener();
            $this->load->view('header');
            $this->load->view('DoctoresDV/reporteDoctorDV',$data);
            $this->load->view('footer');
        }
    }
?>