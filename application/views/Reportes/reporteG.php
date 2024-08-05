<br>
<h3 class="text-center">
    <b>REPORTE GENERAL</b>
</h3>
<br>
<div id="mapa-direccion" style="border:1px solid black; height:450px; width:100%"></div>
<script>
    function initMap(){
        var coordenadaCentral = new google.maps.LatLng(-0.11709584500070387, -78.41606623166749); 
        var mapa1 = new google.maps.Map(
            document.getElementById('mapa-direccion'),
            {
                center:coordenadaCentral,
                zoom:8,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            }
        );

        <?php foreach($maternidades as $maternidad): ?>
            var coordenada = new google.maps.LatLng(<?php echo $maternidad->latitud_mat; ?>, <?php echo $maternidad->longitud_mat; ?>);
            var marcador = new google.maps.Marker({
                position: coordenada,
                map: mapa1,
                title: '<?php echo $maternidad->id_mat; ?>  <?php echo $maternidad->nombre_mat;?>',
                icon:'<?php echo base_url("assets/img/maternidad.png");?>'
               
            });
        <?php endforeach; ?>

        <?php foreach($clinicas as $clinica): ?>
            var coordenada = new google.maps.LatLng(<?php echo $clinica->latitud_cli; ?>, <?php echo $clinica->longitud_cli; ?>);
            var marcador = new google.maps.Marker({
                position: coordenada,
                map: mapa1,
                title: '<?php echo $clinica->id_cli;?> <?php echo $clinica->nombre_cli;?>',
                icon:'<?php echo base_url("assets/img/clinica.png");?>'
                
                
            });
        <?php endforeach; ?>

        <?php foreach($hospitales as $hospital): ?>
            var coordenada = new google.maps.LatLng(<?php echo $hospital->latitud_hos; ?>, <?php echo $hospital->longitud_hos; ?>);
            var marcador = new google.maps.Marker({
                position: coordenada,
                map: mapa1,
                title: '<?php echo $hospital->id_hos; ?> <?php echo $hospital->nombre_hos;?>',
                icon:'<?php echo base_url("assets/img/hospital.png");?>'
            });
        <?php endforeach; ?>

        
        <?php foreach($doctoresdv as $doctordv): ?>
            var coordenada = new google.maps.LatLng(<?php echo $doctordv->latitud_doc_dv; ?>, <?php echo $doctordv->longitud_doc_dv; ?>);
            var marcador = new google.maps.Marker({
                position: coordenada,
                map: mapa1,
                title: '<?php echo $doctordv->id_doc_dv; ?> <?php echo $doctordv->nombre_doc_dv;?>',
                icon:'<?php echo base_url("assets/img/doctor.png");?>'
            });
        <?php endforeach; ?>
        
    }
   
</script>