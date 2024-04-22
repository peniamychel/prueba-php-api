<?php
#constante de la url api
const API_URL = "https://whenisthenextmcufilm.com/api/";

# Inicializar una nueva sedion de cURL; ch = cURL handle
$ch = curl_init(API_URL);
//Indicar que queresmos recibir el resultado de la peticion y no mostrarla en la pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ejecutar la peticion y guardamos el resultado
$result = curl_exec($ch);
//convertirmos el result en un array asociativo
$data = json_decode($result, true);

#alternativa ultilizar file_get_contents, solo para hacer GET de una api
//$result = file_get_contents(API_URL);

//cerramos la sesion de cURL
curl_close($ch);

//mostramos el arrary asincrono
//var_dump($data);

?>

<head>
    <meta charset="UTF-8">
    <title>La proxima pelicula</title>
    <meta name="description" content="La proxima peli de marvel">
    <neta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />

</head>

<main>
    <!-- <pre style="font-size: 20px; overflow: scroll; height: 300px;">
        <?php var_dump($data); ?>
    </pre> -->
    <section>
        <img src="<?= $data["poster_url"] ?>" width="300" alt="Poster de <?= $data["title"] ?>">
        <!-- <h2>La proxima peli de marvel</h2> -->
        <hgroup>
            <h3><?= $data["title"] ?> se extrena en <?= $data["days_until"] ?> dias.</h3>
            <p>Fecha de estreno: <?= $data["release_date"] ?></p>
            <p>La siguiente peli es: <?= $data["following_production"]["title"] ?></p>
        </hgroup>
    </section>
</main>
<style>
    :root{
        color-scheme: lignt dark;
    }
    body{
        display: grid;
        place-content: center;
    }
</style>