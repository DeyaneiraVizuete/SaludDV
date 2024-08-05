<?php
    class Reportes extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Clinica');
            $this->load->model('Hospital');
            $this->load->model('Maternidad');
            $this->load->model('DoctorDV');

        }
       
        public function reporteG(){
            $hospitales=$this->Hospital->obtener();
            $clinicas=$this->Clinica->obtener();
            $maternidades=$this->Maternidad->obtener();
            $doctoresdv=$this->DoctorDV->obtener();

            //Para pasar datos a la vista
            $data['hospitales']=$hospitales;
            $data['clinicas']=$clinicas; 
            $data['maternidades']=$maternidades; 
            $data['doctoresdv']=$doctoresdv; 
            
            //Relacionar con el index
            $this->load->view('header');
            $this->load->view('Reportes/reporteG',$data);
            $this->load->view('footer');   
        }
    }
?>