<br>
<h3 class="text-center">
    <b>DIRECCIÓN HOSPITALES</b>
</h3>
<br>
<?php if ($hospitales) : ?>
    <table class="table table-bordered table-striped table-hover" id="tbl-hospitales">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">TELÉFONO</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">NÚMERO CONSULTORIOS</th>
                <th class="text-center">NÚMERO MÉDICOS</th>
                <th class="text-center">TIPO HOSPITAL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hospitales as $hospitalTemporal) : ?>
                <tr>
                    <td class="text-center"><?php echo $hospitalTemporal->id_hos; ?></td>
                    <td class="text-center"><?php echo $hospitalTemporal->nombre_hos; ?></td>
                    <td class="text-center"><?php echo $hospitalTemporal->telefono_hos; ?></td>
                    <td class="text-center"><?php echo $hospitalTemporal->email_hos; ?></td>
                    <td class="text-center"><?php echo $hospitalTemporal->numero_consultorio_hos; ?></td>
                    <td class="text-center"><?php echo $hospitalTemporal->numero_medicos_hos; ?></td>
                    <td class="text-center"><?php echo $hospitalTemporal->tipo_hos; ?></td>
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

        <?php foreach($hospitales as $hospital): ?>
            var coordenada = new google.maps.LatLng(<?php echo $hospital->latitud_hos; ?>, <?php echo $hospital->longitud_hos; ?>);
            var marcador = new google.maps.Marker({
                position: coordenada,
                map: mapa1,
                title: '<?php echo $hospital->nombre_hos;?>'
            });
        <?php endforeach; ?>
    }
</script>