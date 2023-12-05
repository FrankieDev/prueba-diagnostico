<?php
include_once 'clases/DB.php';
include_once 'clases/Localizacion.php';
include_once 'clases/Voto.php';
include_once 'clases/Candidato.php';

if (isset($_GET['accion']) && $_GET['accion'] == 'getRegiones') {
    $regiones = Localizacion::getRegiones();

    echo json_encode($regiones);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'getComunas') {
    $comunas = Localizacion::getComunas($_GET['region']);

    echo json_encode($comunas);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'getCandidatos') {
    $candidatos = Candidato::getCandidatos();

    echo json_encode($candidatos);
}

if (isset($_POST['accion']) && $_POST['accion'] == 'guardarVoto') {

    $data = json_decode($_POST['data']);
    $voto = Voto::insertarVoto($data);

    echo json_encode($voto);
}
