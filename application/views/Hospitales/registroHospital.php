<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">Registrar Hospitales </h3>
            <hr>
            <form action="<?php echo site_url('Hospitales/guardar'); ?>" id="frm_registrar_hospital" method="post">
                <br>
                <label for=""><b>Nombre Hospitales: </b></label>
                <input type="text" name="nombre_hos" id="nombre_hos" placeholder="Ingrese el nombre del hospital " class="form-control">
                <br>
                <label for=""><b>Telefono: </b></label>
                <input type="text" name="telefono_hos" id="telefono_hos" placeholder="Ingrese telefono del hospital" class="form-control">
                <br>
                <label for=""><b>Email: </b></label>
                <input type="email" name="email_hos" id="email_hos" placeholder="Ingrese email del hospital" class="form-control">
                <br>
                <label for=""><b>Número Consultorios: </b></label>
                <input type="text" name="numero_consultorio_hos" id="numero_consultorio_hos" placeholder="Ingrese el número de consultorios" class="form-control">
                <br>
                <label for=""><b>Número Médicos: </b></label>
                <input type="text" name="numero_medicos_hos" id="numero_medicos_hos" placeholder="Ingrese el número de médicos" class="form-control">
                <br>
                <label for="tipo_hos"><b>Tipo Hospital: </b></label>
                <select name="tipo_hos" id="tipo_hos" class="form-control">
                    <option selected>---Seleccione---</option>
                    <option value="Público">1. Público</option>
                    <option value="Privado">2. Privado</option>
                    <option value="Especializado">3. Especializado</option>
                    <option value="General">4. General</option>
                </select>
                <br>
                <label for=""><b>Dirección: </b></label>
                <input type="number" name="latitud_hos" id="latitud_hos" readonly placeholder="Seleccione la ubicación en el mapa" class="form-control">
                <br>
                <input type="number" name="longitud_hos" id="longitud_hos" readonly placeholder="Seleccione la ubicación en el mapa" class="form-control">
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
            <h3 class="text-center">Listado de Hospitales</h3>
            <br>
            <div class="text-end">
                <a href="<?php echo site_url('Hospitales/reporteHospital');?>" class="btn btn-secondary">Ver todos los Hospitales</a>
            </div>
            <br>
            <?php if($hospitales): ?>
            <table class="table table-bordered table-striped table hover" id="tbl-hospitales">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">TELÉFONO</th>
                        <th class="text-center">EMAIL</th>
                        <th class="text-center">NÚMERO CONSULTORIOS</th>
                        <th class="text-center">NÚMERO MÉDICOS</th>
                        <th class="text-center">TIPO HOSPITAL</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>   
                </thead>
                <tbody>
                    <?php foreach($hospitales as $hospitalTemporal): ?>
                        <tr>
                            <td class="text-center"><?php echo $hospitalTemporal->id_hos; ?></td>
                            <td class="text-center"><?php echo $hospitalTemporal->nombre_hos; ?></td>
                            <td class="text-center"><?php echo $hospitalTemporal->telefono_hos; ?></td>
                            <td class="text-center"><?php echo $hospitalTemporal->email_hos; ?></td>
                            <td class="text-center"><?php echo $hospitalTemporal->numero_consultorio_hos; ?></td>
                            <td class="text-center"><?php echo $hospitalTemporal->numero_medicos_hos; ?></td>
                            <td class="text-center"><?php echo $hospitalTemporal->tipo_hos; ?></td>
                            <td class="text-center">
                            <a href="<?php echo site_url('Hospitales/graficarDireccion'); ?>/<?php echo $hospitalTemporal->id_hos; ?>" 
                                    class="btn btn-primary" target="_blank">Ver Dirección</a>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="<?php echo site_url('Hospitales/eliminar'); ?>/<?php echo $hospitalTemporal->id_hos; ?>" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar el hospital?');">Eliminar</a>
                        </td>
                        </tr>
                       
                    <?php endforeach; ?>
                </tbody>
            </table>
           
                    <?php // print_r($clientes); ?>
                <?php else: ?>                    
                    <h3 style="color:red;">
                        No existen hospitales regitrados
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
            icon:'<?php echo base_url("assets/img/hospital.png");?>'
        });
        google.maps.event.addListener(
            marcador,
            'dragend',
            function(event){
                var latitud=this.getPosition().lat();
                var longitud=this.getPosition().lng();
                //alert(latitud+"----"+longitud);//prueba
                document.getElementById('latitud_hos').value=latitud;
                document.getElementById('longitud_hos').value=longitud;
            }
        );

    }

</script>