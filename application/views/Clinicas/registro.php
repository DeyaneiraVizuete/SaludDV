<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">Registrar Clínicas </h3>
            <hr>
            <form action="<?php echo site_url('Clinicas/guardar'); ?>" id="frm_registrar_clinica" method="post">
                <br>
                <label for=""><b>Nombre Clinica: </b></label>
                <input type="text" name="nombre_cli" id="nombre_cli" placeholder="Ingrese el nombre de la clinica " class="form-control">
                <br>
                <label for=""><b>Telefono: </b></label>
                <input type="text" name="telefono_cli" id="telefono_cli" placeholder="Ingrese telefono de la clinica" class="form-control">
                <br>
                <label for=""><b>Email: </b></label>
                <input type="email" name="email_cli" id="email_cli" placeholder="Ingrese email de la clinica" class="form-control">
                <br>
                <label for=""><b>Dirección: </b></label>
                <input type="number" name="latitud_cli" id="latitud_cli" readonly placeholder="Seleccione la ubicación en el mapa" class="form-control">
                <br>
                <input type="number" name="longitud_cli" id="longitud_cli" readonly placeholder="Seleccione la ubicación en el mapa" class="form-control">
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
            <h3 class="text-center">Listado de Clínicas</h3>
            <br>
            <div class="text-end">
                <a href="<?php echo site_url('Clinicas/reporte');?>" class="btn btn-secondary">Ver Todas las Clínicas</a>
            </div>
            <br>
            <?php if($clinicas): ?>
            <table class="table table-bordered table-striped table hover" id="tbl-clinicas">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">TELÉFONO</th>
                        <th class="text-center">EMAIL</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>   
                </thead>
                <tbody>
                    <?php foreach($clinicas as $clinicaTemporal): ?>
                        <tr>
                            <td class="text-center"><?php echo $clinicaTemporal->id_cli; ?></td>
                            <td class="text-center"><?php echo $clinicaTemporal->nombre_cli; ?></td>
                            <td class="text-center"><?php echo $clinicaTemporal->telefono_cli; ?></td>
                            <td class="text-center"><?php echo $clinicaTemporal->email_cli; ?></td>
                            <td class="text-center">
                            <a href="<?php echo site_url('Clinicas/graficarDireccion'); ?>/<?php echo $clinicaTemporal->id_cli; ?>" 
                                    class="btn btn-primary" target="_blank">Ver Dirección</a>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="<?php echo site_url('Clinicas/eliminar'); ?>/<?php echo $clinicaTemporal->id_cli; ?>" class="btn btn-danger" onclick="return confirm('Esta seguro que va a elimiar la clinica?');">Eliminar</a>
                        </td>
                        </tr>
                       
                    <?php endforeach; ?>
                </tbody>
            </table>
           
                    <?php // print_r($clientes); ?>
                <?php else: ?>                    
                    <h3 style="color:red;">
                        No existen clinicas regitradas
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
            icon:'<?php echo base_url("assets/img/clinica.png");?>'
        });
        google.maps.event.addListener(
            marcador,
            'dragend',
            function(event){
                var latitud=this.getPosition().lat();
                var longitud=this.getPosition().lng();
                //alert(latitud+"----"+longitud);//prueba
                document.getElementById('latitud_cli').value=latitud;
                document.getElementById('longitud_cli').value=longitud;
            }
        );

    }

</script>