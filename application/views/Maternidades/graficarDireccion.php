<br>
<h3>
    <b>DIRECCION DE MATERNIDAD</b>
</h3>
<table class="table table-bordered table-striped table-hover"
>
    <tr>
        <th>NOMBRE: </th>
        <td><?php echo $maternidad->nombre_mat; ?></td>
        <th>TELEFONO: </th>
        <td><?php echo $maternidad->telefono_mat; ?></td>
        <th>EMAIL: </th>
        <td><?php echo $maternidad->email_mat; ?></td>
        <th>CAPACIDAD: </th>
        <td><?php echo $maternidad->capacidad_mat; ?></td>

    </tr>
    <tr>
        <th>LATITUD:</th>
        <td><?php echo $maternidad->latitud_mat; ?></td>
        <th>LONGITUD:</th>
        <td><?php echo $maternidad->longitud_mat; ?></td>
    </tr>
</table>
<br>
<div id="mapa-direccion" style="border: 1px solid black; height:450px; width:100%; margin-top:10px;"></div>

<script>

    function initMap(){

        //Crear el mapa en el cruadrito que le establecimos en el html

        var coordenadaCentral=new google.maps.LatLng(<?php echo $maternidad->latitud_mat; ?>, <?php echo $maternidad->longitud_mat; ?>);
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
            title:'<?php echo $maternidad->id_mat; ?> <?php echo $maternidad->nombre_mat; ?> ',
            draggable:true

        });
    }
</script>