<br>
<h3 class="text-center">
    <b>DIRECCIÓN DOCTORES</b>
</h3>
<br>
<?php if ($doctoresdv) : ?>
    <table class="table table-bordered table-striped table-hover" id="tbl-doctores">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">DNI: </th>
                <th class="text-center">APELLIDO: </th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">ESPECIALIDAD</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctoresdv as $doctorTemporal) : ?>
                <tr>
                    <td class="text-center"><?php echo $doctorTemporal->id_doc_dv; ?></td>
                    <td class="text-center"><?php echo $doctorTemporal->dni_doc_dv; ?></td>
                    <td class="text-center"><?php echo $doctorTemporal->apellido_doc_dv; ?></td>
                    <td class="text-center"><?php echo $doctorTemporal->nombre_doc_dv; ?></td>
                    <td class="text-center"><?php echo $doctorTemporal->especialidad_doc_dv; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif; ?>
<br>
<div id="mapa-direccion" style="border:1px solid black; height:450px; width:100%"></div>

<script>
    function initMap(){
        var coordenadaCentral = new google.maps.LatLng(-0.11709584500070387, -78.41606623166749); 
        var mapa1 = new google.maps.Map(
            document.getElementById('mapa-direccion'),
            {
                center:coordenadaCentral,
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            }
        );

        <?php foreach($doctoresdv as $doctor): ?>
            var coordenada = new google.maps.LatLng(<?php echo $doctor->latitud_doc_dv; ?>, <?php echo $doctor->longitud_doc_dv; ?>);
            var marcador = new google.maps.Marker({
                position: coordenada,
                map: mapa1,
                title: '<?php echo $doctor->nombre_doc_dv;?>',
                draggable:true,
                icon:'<?php echo base_url("assets/img/doctor.png");?>'
            });
        <?php endforeach; ?>
    }
</script>
