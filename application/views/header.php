<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALUD</title>
    <!-- Importando API de Google Maps  -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChmScprYjBBfdqK6HNsx4QrNYti2tAZus&libraries=places&callback=initMap" ></script>
    <!-- Importando Boostrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Importando Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo site_url(); ?>">SALUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url(); ?>">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>/Clinicas/registro">Clinicas</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>/Hospitales/registroHospital">Hospitales</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>/Maternidades/registroMaternidad">Maternidades</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>/DoctoresDV/registroDoctorDV">Doctores DV</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>/Reportes/reporteG">Reporte General</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    
