<?php
$htmlResultados = '';

// Función para obtener el ID desde la URL
function getIdFromUrl($url)
{
    $urlParts = explode('/', rtrim($url, '/'));
    return end($urlParts);
}

// Obtener detalles de la generación para obtener el rango de IDs de Pokémon
function getGenerationData($generationUrl)
{
    $generationResponse = file_get_contents($generationUrl);
    if ($generationResponse === false) {
        // Manejar el error, tal vez devolver un array vacío o registrar el problema
        return null;
    }
    return json_decode($generationResponse, true);
}

if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
    $categoriaSeleccionada = $_POST['categoria'];
    $pokeApiUrl = "https://pokeapi.co/api/v2/generation/$categoriaSeleccionada/";	
    // Obtener el ID de inicio y fin para la generación seleccionada
    $generationData = getGenerationData($pokeApiUrl);

    if ($generationData !== null && isset($generationData['pokemon_species'])) {
        $startId = getIdFromUrl($generationData['pokemon_species'][0]['url']);
        $endId = getIdFromUrl(end($generationData['pokemon_species'])['url']);
    } else {
        // Manejar el error, tal vez devolver un array vacío o registrar el problema
        $startId = $endId = 0;
    }
} else {
    // Por defecto, obtener todos los Pokémon
    $pokeApiUrl = 'https://pokeapi.co/api/v2/generation/1/';	
    $generationData = getGenerationData($pokeApiUrl);

    if ($generationData !== null && isset($generationData['pokemon_species'])) {
        $startId = getIdFromUrl($generationData['pokemon_species'][0]['url']);
        $endId = getIdFromUrl(end($generationData['pokemon_species'])['url']);
    } else {
        // Manejar el error, tal vez devolver un array vacío o registrar el problema
        $startId = $endId = 0;
    }
}

// Solicitud por lotes para obtener datos de Pokémon con un límite de 50
$limit = 10; // Cambia el límite según sea necesario
$offset = $startId;

$pokemonDetailsUrl = "https://pokeapi.co/api/v2/pokemon/?offset=$offset&limit=$limit";
$pokemonDetailsResponse = file_get_contents($pokemonDetailsUrl);
$pokemonDetailsData = json_decode($pokemonDetailsResponse, true);

if ($pokemonDetailsData && isset($pokemonDetailsData['results'])) {
    $htmlResultados = '<div class="owl-carousel2 owl-2">';
    // El resto de tu código permanece sin cambios
    foreach ($pokemonDetailsData['results'] as $pokemon) {
        $pokemonId = getIdFromUrl($pokemon['url']);

        $pokeId = getIdFromUrl($pokemon['url']);

        $pokemonDetailsResponse = file_get_contents("https://pokeapi.co/api/v2/pokemon/$pokemonId/");
        $pokemonDetails = json_decode($pokemonDetailsResponse, true);

        $pokemonName = ucwords($pokemonDetails['name']);
        $type1 = isset($pokemonDetails['types']) ? $pokemonDetails['types'][0]['type']['name'] : 'unknown';
        $baseExperience = $pokemonDetails['base_experience'];
        $height = $pokemonDetails['height'] / 10; // Convertir a metros
        $weight = $pokemonDetails['weight'] / 10; // Convertir a kilogramos

        $htmlResultados .= '
        <div class="media-29103 pokemon ' . $type1 . '" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="' . $pokemonName . ' ' . $baseExperience . ' ' . $pokemonId . ' ' . $type1 . '" data-id="' . $pokeId . '" data-titulo="' . $pokemonName . '" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">' . $pokemonName . '</span>
                <span class="number"><b>' . $pokeId . '</b></span>
                <ol class="types">
                    <br>
                    <span class="badge ' . $type1 . '_dark">' . $type1 . '</span><br>
                    <span class="badge '.$type1.'_dark">Base Experience: ' . $baseExperience . '</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_' . $pokemonId . '.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>';
    }

    $htmlResultados .= '</div>';
} else {
    echo "Error al obtener la información de la PokeAPI.";
}

echo $htmlResultados;

// Mostrar el rango de IDs de Pokémon para la generación seleccionada o todos los Pokémon
//echo "ID Inicio: $startId<br>";
//echo "ID Final: $endId";
?>
