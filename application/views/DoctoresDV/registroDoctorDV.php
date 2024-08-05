<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">Registrar Doctores </h3>
            <hr>
            <form action="<?php echo site_url('DoctoresDV/guardar'); ?>" id="frm_registrar_doctor" method="post">
                <br>
                <label for=""><b>Dni Doctor: </b></label>
                <input type="text" name="dni_doc_dv" id="dni_doc_dv" placeholder="Ingrese el dni del doctor" class="form-control">
                <br>
                <label for=""><b>Apellido Doctor: </b></label>
                <input type="text" name="apellido_doc_dv" id="apellido_doc_dv" placeholder="Ingrese el apellido del doctor" class="form-control">
                <br>
                <label for=""><b>Nombre Doctores: </b></label>
                <input type="text" name="nombre_doc_dv" id="nombre_doc_dv" placeholder="Ingrese el nombre del doctor " class="form-control">
                <br>
                <label for=""><b>Dirección: </b></label>
                <input type="number" name="latitud_doc_dv" id="latitud_doc_dv" readonly placeholder="Seleccione la ubicación en el mapa" class="form-control">
                <br>
                <input type="number" name="longitud_doc_dv" id="longitud_doc_dv" readonly placeholder="Seleccione la ubicación en el mapa" class="form-control">
                <br>
                <label for=""><b>Especialidades:</b></label>
                <select name="especialidad_doc_dv" id="especialidad_doc_dv" class="form-control" required>
                    <option value="">---Seleccione---</option>
                    <option value="General">1. General</option>
                    <option value="Odontologia">2. Odontologia</option>
                    <option value="Pediatria">3. Pediatria</option>
                </select>
                <br>
                <div id="mapa-direccion" style="border:1px solid black; height:250px; width:100%; margin.top:10px;"></div>
                <br>
                <button class="btn btn-success" type="Submit">Guardar</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- reset es para limpiar los campos-->
                <button class="btn btn-light" type="reset">Cancelar</button> 
            </form>
        </div>
        <div class="col-md-8"> 
            <h3 class="text-center">Listado de Doctores</h3>
            <br>
            <div class="text-end">
                <a href="<?php echo site_url('DoctoresDV/reporteDoctorDV');?>" class="btn btn-secondary">Ver todos los Doctores</a>
            </div>
            <br>
            <?php if($doctoresdv): ?>
            <table class="table table-bordered table-striped table hover" id="tbl-doctores">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">DNI</th>
                        <th class="text-center">APELLIDO</th>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">ESPECIALIDAD</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>   
                </thead>
                <tbody>
                    <?php foreach($doctoresdv as $doctorTemporal): ?>
                        <tr>
                            <td class="text-center"><?php echo $doctorTemporal->id_doc_dv; ?></td>
                            <td class="text-center"><?php echo $doctorTemporal->dni_doc_dv; ?></td>
                            <td class="text-center"><?php echo $doctorTemporal->apellido_doc_dv; ?></td>
                            <td class="text-center"><?php echo $doctorTemporal->nombre_doc_dv; ?></td>
                            <td class="text-center"><?php echo $doctorTemporal->especialidad_doc_dv; ?></td>
                            <td class="text-center">
                            <a href="<?php echo site_url('DoctoresDV/graficarDireccion'); ?>/<?php echo $doctorTemporal->id_doc_dv; ?>" 
                                    class="btn btn-primary" target="_blank">Ver Dirección</a>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="<?php echo site_url('DoctoresDV/eliminar'); ?>/<?php echo $doctorTemporal->id_doc_dv; ?>" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar el doctor?');">Eliminar</a>
                        </td>
                        </tr>
                       
                    <?php endforeach; ?>
                </tbody>
            </table>
           
                    <?php // print_r($clientes); ?>
                <?php else: ?>                    
                    <h3 style="color:red;">
                        No existen doctores regitrados
                    </h3>
                <?php endif; ?>
        </div>
    </div>
</div>
<br><br>
<script>
    function initMap(){
        var coordenadaCentral=new google.maps.LatLng(-0.9291329531385978, -78.620709850085);
        var mapa1=new google.maps.Map(
            document.getElementById('mapa-direccion'),
            {
                center:coordenadaCentral,
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            }
        );
        var marcador=new google.maps.Marker({
            position:coordenadaCentral,
            map:mapa1,
            title:'Seleccion de dirección',
            draggable:true,
            icon:'<?php echo base_url("assets/img/doctor.png");?>'
        });
        google.maps.event.addListener(
            marcador,
            'dragend',
            function(event){
                var latitud=this.getPosition().lat();
                var longitud=this.getPosition().lng();
                //alert(latitud+"----"+longitud);//prueba
                document.getElementById('latitud_doc_dv').value=latitud;
                document.getElementById('longitud_doc_dv').value=longitud;
            }
        );

    }

</script>