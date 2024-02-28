<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pokedex - pokeapi - pokemon app</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link rel="icon" type="image/png" href="favicon.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <!-- jQuery (asegúrate de incluirlo antes que Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css"> <!-- Style -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- CSS Pokedex -->
    <link rel="stylesheet" href="assets/css/pokedex.css">
    <!-- CSS para el Modal -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Bootstrap CSS -->
	
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>

<body>
    <!-- Primer Modal -->
    <div class="modal fade" id="modalExpositor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Contenido del primer modal -->
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Contenido del modal -->
                    <div class="container flex-center">
                        <h2>PokeDex</h2>
                        <div class="col-md-5 col-sm-5 pokemon-card" id="pokemon_details">
                            <div class="img-container">
                                <img id="update_img" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png" alt="" srcset="">
                            </div>
                            <div class="detail-container">
                                <div class="title-container">
                                    <h3 class="name text-center" id="update_name">Pikachu</h3>
                                    <hr class="seperator">
                                    <div class="stats text-center">
                                        <span class="first cp-text col-md-6" id="update_hp">HP 32/32</span>
                                        <span class="cp-text col-md-6" id="update_cp">XP 149</span>
                                    </div>
                                </div>
                               
								
								
								<button class="btn-transfer" id="guardarPokemonBtn" data-url="{{ url('/guardar-pokemon') }}">GUARDAR</button>
								
								
								


                                <div class="attributes-container">
                                    <div class="col attributes-content" style="min-width: 42%;">
                                        <p class="cp-text" id="update_type">Electric / Speed</p>
                                        <small class="text-muted">Type</small>
                                    </div>
                                    <div class="col attributes-content">
                                        <p class="cp-text" id="update_weight">5.58kg</p>
                                        <small class="text-muted">Weight</small>
                                    </div>
                                    <div class="col attributes-content">
                                        <p class="cp-text no-border" id="update_height">0.82m</p>
                                        <small class="text-muted">Height</small>
                                    </div>
                                </div>
                                <div class="player-data">
                                    <div class="col data-container">
                                        <p class="stardust" id="update_stardust">500</p>
                                        <p class="muted-text">Stardust</p>
                                    </div>
                                    <div class="col data-container">
                                        <p class="stardust" id="update_candy">1</p>
                                        <p class="muted-text" id="update_candy_title">Pikachu Candy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="card-body">
   
</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cerrarModalBtn" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
   <section id="breadcrumbs" class="breadcrumbs">
    <div class="container d-flex justify-content-center align-items-center">
	
	<a href="http://localhost/pokeservices/public/mostrar-pokemons" class="btn btn-primary">Ver Pokémon Guardados</a>
     
    </div>
</section>

        <section id="breadcrumbs" class="pricing">
            <div class="container" data-aos="fade-up">
                <br>
                <div style="text-align: center;">
                    <h2 style="color:#ed502e;"><b>Pokedex</b>
                    </h2>
                    <!--h2>PokeDex</h2-->
                </div>
                <br>
                <div class="section-title" style="text-align: justify;">
                    <h4 style="color:#e3dede;font-size: 17px;">Te damos la bienvenida a nuestro espacio, en donde podrá
                        consultar datos y cifras de nuestros pokemons. Haga clic en cada Pokemon para ver mas información. Guarda tus pokemon favaoritos
                    </h4>
					<ul>
					<li> Al seleccionar una Generación, se hace una carga de los pokemon </li>
					<li> Puede con el mouse mover el Carrusel </li>
					<li> Haga clic en cada Pokemon para ver más información y puede guardar el pokemon en la base de datos </li>
					<li> Cada Pokemon según el tipo, carga el color correspondiente de manera automática </li>
					<br>
					<li> Los Pokemons se guardan y se visualizan a  través de  un <b>servicio en laravel</b> </li>
					</ul>
					
                </div>
				 <br>
                <div class="container owl-2-style">
                    <div class="input-group">
                        <span class="input-group-addon me-2">Buscar</span>
                        <select id="filtroGeneracion" class="form-control me-2" name="filtroGeneracion">
                            <option selected value="">Seleccione una Categoria</option>
                            <option value="1">1st Gen</option>
                            <option value="2">2nd Gen</option>
                            <option value="3">3rd Gen</option>
                            <option value="4">4rd Gen</option>
                            <!--option value="5">5rd Gen</option>
                            <option value="6">6rd Gen</option-->
                        </select>
                        <input id="filtrar2" type="text" class="form-control me-2" placeholder="Buscar...">
                    </div>
                    <br>

                    <div id="rotilo" class="owl-carousel2 owl-2">
                       

                      
                   <div class="media-29103 pokemon grass" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Ivysaur 142 2 grass" data-id="2" data-titulo="Ivysaur" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Ivysaur</span>
                <span class="number"><b>2</b></span>
                <ol class="types">
                    <br>
                    <span class="badge grass_dark">grass</span><br>
                    <span class="badge grass_dark">Base Experience: 142</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_2.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon grass" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Venusaur 263 3 grass" data-id="3" data-titulo="Venusaur" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Venusaur</span>
                <span class="number"><b>3</b></span>
                <ol class="types">
                    <br>
                    <span class="badge grass_dark">grass</span><br>
                    <span class="badge grass_dark">Base Experience: 263</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_3.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon fire" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Charmander 62 4 fire" data-id="4" data-titulo="Charmander" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Charmander</span>
                <span class="number"><b>4</b></span>
                <ol class="types">
                    <br>
                    <span class="badge fire_dark">fire</span><br>
                    <span class="badge fire_dark">Base Experience: 62</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_4.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon fire" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Charmeleon 142 5 fire" data-id="5" data-titulo="Charmeleon" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Charmeleon</span>
                <span class="number"><b>5</b></span>
                <ol class="types">
                    <br>
                    <span class="badge fire_dark">fire</span><br>
                    <span class="badge fire_dark">Base Experience: 142</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_5.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon fire" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Charizard 267 6 fire" data-id="6" data-titulo="Charizard" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Charizard</span>
                <span class="number"><b>6</b></span>
                <ol class="types">
                    <br>
                    <span class="badge fire_dark">fire</span><br>
                    <span class="badge fire_dark">Base Experience: 267</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_6.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon water" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Squirtle 63 7 water" data-id="7" data-titulo="Squirtle" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Squirtle</span>
                <span class="number"><b>7</b></span>
                <ol class="types">
                    <br>
                    <span class="badge water_dark">water</span><br>
                    <span class="badge water_dark">Base Experience: 63</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_7.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon water" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Wartortle 142 8 water" data-id="8" data-titulo="Wartortle" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Wartortle</span>
                <span class="number"><b>8</b></span>
                <ol class="types">
                    <br>
                    <span class="badge water_dark">water</span><br>
                    <span class="badge water_dark">Base Experience: 142</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_8.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon water" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Blastoise 265 9 water" data-id="9" data-titulo="Blastoise" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Blastoise</span>
                <span class="number"><b>9</b></span>
                <ol class="types">
                    <br>
                    <span class="badge water_dark">water</span><br>
                    <span class="badge water_dark">Base Experience: 265</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_9.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Caterpie 39 10 bug" data-id="10" data-titulo="Caterpie" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Caterpie</span>
                <span class="number"><b>10</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 39</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_10.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Metapod 72 11 bug" data-id="11" data-titulo="Metapod" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Metapod</span>
                <span class="number"><b>11</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 72</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_11.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Butterfree 198 12 bug" data-id="12" data-titulo="Butterfree" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Butterfree</span>
                <span class="number"><b>12</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 198</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_12.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Weedle 39 13 bug" data-id="13" data-titulo="Weedle" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Weedle</span>
                <span class="number"><b>13</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 39</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_13.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Kakuna 72 14 bug" data-id="14" data-titulo="Kakuna" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Kakuna</span>
                <span class="number"><b>14</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 72</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_14.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Beedrill 178 15 bug" data-id="15" data-titulo="Beedrill" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Beedrill</span>
                <span class="number"><b>15</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 178</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_15.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Pidgey 50 16 normal" data-id="16" data-titulo="Pidgey" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Pidgey</span>
                <span class="number"><b>16</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 50</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_16.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Pidgeotto 122 17 normal" data-id="17" data-titulo="Pidgeotto" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Pidgeotto</span>
                <span class="number"><b>17</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 122</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_17.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Pidgeot 216 18 normal" data-id="18" data-titulo="Pidgeot" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Pidgeot</span>
                <span class="number"><b>18</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 216</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_18.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Rattata 51 19 normal" data-id="19" data-titulo="Rattata" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Rattata</span>
                <span class="number"><b>19</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 51</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_19.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Raticate 145 20 normal" data-id="20" data-titulo="Raticate" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Raticate</span>
                <span class="number"><b>20</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 145</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_20.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Spearow 52 21 normal" data-id="21" data-titulo="Spearow" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Spearow</span>
                <span class="number"><b>21</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 52</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_21.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Fearow 155 22 normal" data-id="22" data-titulo="Fearow" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Fearow</span>
                <span class="number"><b>22</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 155</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_22.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon poison" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Ekans 58 23 poison" data-id="23" data-titulo="Ekans" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Ekans</span>
                <span class="number"><b>23</b></span>
                <ol class="types">
                    <br>
                    <span class="badge poison_dark">poison</span><br>
                    <span class="badge poison_dark">Base Experience: 58</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_23.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon poison" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Arbok 157 24 poison" data-id="24" data-titulo="Arbok" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Arbok</span>
                <span class="number"><b>24</b></span>
                <ol class="types">
                    <br>
                    <span class="badge poison_dark">poison</span><br>
                    <span class="badge poison_dark">Base Experience: 157</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_24.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon electric" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Pikachu 112 25 electric" data-id="25" data-titulo="Pikachu" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Pikachu</span>
                <span class="number"><b>25</b></span>
                <ol class="types">
                    <br>
                    <span class="badge electric_dark">electric</span><br>
                    <span class="badge electric_dark">Base Experience: 112</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_25.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon electric" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Raichu 243 26 electric" data-id="26" data-titulo="Raichu" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Raichu</span>
                <span class="number"><b>26</b></span>
                <ol class="types">
                    <br>
                    <span class="badge electric_dark">electric</span><br>
                    <span class="badge electric_dark">Base Experience: 243</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_26.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon ground" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Sandshrew 60 27 ground" data-id="27" data-titulo="Sandshrew" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Sandshrew</span>
                <span class="number"><b>27</b></span>
                <ol class="types">
                    <br>
                    <span class="badge ground_dark">ground</span><br>
                    <span class="badge ground_dark">Base Experience: 60</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_27.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div> 
        <div class="media-29103 pokemon grass" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Ivysaur 142 2 grass" data-id="2" data-titulo="Ivysaur" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Ivysaur</span>
                <span class="number"><b>2</b></span>
                <ol class="types">
                    <br>
                    <span class="badge grass_dark">grass</span><br>
                    <span class="badge grass_dark">Base Experience: 142</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_2.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon grass" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Venusaur 263 3 grass" data-id="3" data-titulo="Venusaur" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Venusaur</span>
                <span class="number"><b>3</b></span>
                <ol class="types">
                    <br>
                    <span class="badge grass_dark">grass</span><br>
                    <span class="badge grass_dark">Base Experience: 263</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_3.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon fire" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Charmander 62 4 fire" data-id="4" data-titulo="Charmander" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Charmander</span>
                <span class="number"><b>4</b></span>
                <ol class="types">
                    <br>
                    <span class="badge fire_dark">fire</span><br>
                    <span class="badge fire_dark">Base Experience: 62</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_4.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon fire" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Charmeleon 142 5 fire" data-id="5" data-titulo="Charmeleon" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Charmeleon</span>
                <span class="number"><b>5</b></span>
                <ol class="types">
                    <br>
                    <span class="badge fire_dark">fire</span><br>
                    <span class="badge fire_dark">Base Experience: 142</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_5.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon fire" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Charizard 267 6 fire" data-id="6" data-titulo="Charizard" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Charizard</span>
                <span class="number"><b>6</b></span>
                <ol class="types">
                    <br>
                    <span class="badge fire_dark">fire</span><br>
                    <span class="badge fire_dark">Base Experience: 267</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_6.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon water" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Squirtle 63 7 water" data-id="7" data-titulo="Squirtle" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Squirtle</span>
                <span class="number"><b>7</b></span>
                <ol class="types">
                    <br>
                    <span class="badge water_dark">water</span><br>
                    <span class="badge water_dark">Base Experience: 63</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_7.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon water" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Wartortle 142 8 water" data-id="8" data-titulo="Wartortle" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Wartortle</span>
                <span class="number"><b>8</b></span>
                <ol class="types">
                    <br>
                    <span class="badge water_dark">water</span><br>
                    <span class="badge water_dark">Base Experience: 142</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_8.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon water" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Blastoise 265 9 water" data-id="9" data-titulo="Blastoise" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Blastoise</span>
                <span class="number"><b>9</b></span>
                <ol class="types">
                    <br>
                    <span class="badge water_dark">water</span><br>
                    <span class="badge water_dark">Base Experience: 265</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_9.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Caterpie 39 10 bug" data-id="10" data-titulo="Caterpie" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Caterpie</span>
                <span class="number"><b>10</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 39</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_10.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Metapod 72 11 bug" data-id="11" data-titulo="Metapod" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Metapod</span>
                <span class="number"><b>11</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 72</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_11.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Butterfree 198 12 bug" data-id="12" data-titulo="Butterfree" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Butterfree</span>
                <span class="number"><b>12</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 198</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_12.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Weedle 39 13 bug" data-id="13" data-titulo="Weedle" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Weedle</span>
                <span class="number"><b>13</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 39</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_13.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Kakuna 72 14 bug" data-id="14" data-titulo="Kakuna" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Kakuna</span>
                <span class="number"><b>14</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 72</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_14.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon bug" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Beedrill 178 15 bug" data-id="15" data-titulo="Beedrill" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Beedrill</span>
                <span class="number"><b>15</b></span>
                <ol class="types">
                    <br>
                    <span class="badge bug_dark">bug</span><br>
                    <span class="badge bug_dark">Base Experience: 178</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_15.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Pidgey 50 16 normal" data-id="16" data-titulo="Pidgey" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Pidgey</span>
                <span class="number"><b>16</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 50</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_16.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Pidgeotto 122 17 normal" data-id="17" data-titulo="Pidgeotto" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Pidgeotto</span>
                <span class="number"><b>17</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 122</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_17.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Pidgeot 216 18 normal" data-id="18" data-titulo="Pidgeot" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Pidgeot</span>
                <span class="number"><b>18</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 216</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_18.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Rattata 51 19 normal" data-id="19" data-titulo="Rattata" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Rattata</span>
                <span class="number"><b>19</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 51</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_19.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Raticate 145 20 normal" data-id="20" data-titulo="Raticate" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Raticate</span>
                <span class="number"><b>20</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 145</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_20.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Spearow 52 21 normal" data-id="21" data-titulo="Spearow" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Spearow</span>
                <span class="number"><b>21</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 52</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_21.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon normal" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Fearow 155 22 normal" data-id="22" data-titulo="Fearow" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Fearow</span>
                <span class="number"><b>22</b></span>
                <ol class="types">
                    <br>
                    <span class="badge normal_dark">normal</span><br>
                    <span class="badge normal_dark">Base Experience: 155</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_22.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon poison" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Ekans 58 23 poison" data-id="23" data-titulo="Ekans" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Ekans</span>
                <span class="number"><b>23</b></span>
                <ol class="types">
                    <br>
                    <span class="badge poison_dark">poison</span><br>
                    <span class="badge poison_dark">Base Experience: 58</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_23.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon poison" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Arbok 157 24 poison" data-id="24" data-titulo="Arbok" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Arbok</span>
                <span class="number"><b>24</b></span>
                <ol class="types">
                    <br>
                    <span class="badge poison_dark">poison</span><br>
                    <span class="badge poison_dark">Base Experience: 157</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_24.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon electric" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Pikachu 112 25 electric" data-id="25" data-titulo="Pikachu" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Pikachu</span>
                <span class="number"><b>25</b></span>
                <ol class="types">
                    <br>
                    <span class="badge electric_dark">electric</span><br>
                    <span class="badge electric_dark">Base Experience: 112</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_25.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
        <div class="media-29103 pokemon electric" id="pokemon" data-toggle="modal" data-target="#modalExpositor" data-nombre2="Raichu 243 26 electric" data-id="26" data-titulo="Raichu" data-tipo_grafico="fire">
            <div class="pokeinfo">
                <span class="name" style="font-weight: bold;">Raichu</span>
                <span class="number"><b>26</b></span>
                <ol class="types">
                    <br>
                    <span class="badge electric_dark">electric</span><br>
                    <span class="badge electric_dark">Base Experience: 243</span>
                </ol>
            </div>
            <div class="pokeimg">
                <img src="assets/img/pokemons/poke_26.gif" alt="">
                <div class="imgbackground"></div>
            </div>
        </div>
				   
				   
				   
				   

                    </div>

                </div>
            </div>
        </section>
		
		
    </main><!-- End #main -->

    <!-- Inclusión de scripts y cierre de etiquetas -->
    <?php
    //include "footer.php";
    ?>
    <!-- Vendor JS Files -->

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
		

        $('.owl-carousel2').owlCarousel({
            loop: true, // Bucle infinito
            autoplay: true, // Activar la reproducción automática
            autoplayTimeout: 5000, // Establecer el tiempo en milisegundos entre cada movimiento (en este ejemplo, 5 segundos)
            responsive: {
                0: {
                    items: 1
                }, // Muestra 2 elementos en pantallas pequeñas
                768: {
                    items: 3
                }, // Muestra 3 elementos en pantallas medianas
                992: {
                    items: 3
                }, // Muestra 4 elementos en pantallas grandes
                // Agrega más breakpoints y ajusta la cantidad de elementos según lo necesites
            },
        });

        // Evento al escribir en el campo de búsqueda
        $('#filtrar2').keyup(function() {
            //   filtrarDatos();

            // Filtrar también los elementos visibles por el campo de búsqueda
            var rex = new RegExp($(this).val().toLowerCase(), 'i');
            $('.owl-carousel2 .media-29103').hide().filter(function() {
                return rex.test($(this).data('nombre2'));
            }).show();
        });

        // Evento al hacer clic en cada elemento con la clase 'media-29103'
        filtrarDatos();
        $('#filtroGeneracion').on('input change', function() {
            filtrarDatos();
        });


        function filtrarDatos() {
            var categoriaSeleccionada = $('#filtroGeneracion').val();


            // Realizar una solicitud AJAX para obtener los resultados filtrados
            $.ajax({
                type: 'POST',
                url: 'filtrar_generacion.php', // Reemplaza con la ruta de tu script PHP
                data: {
                    categoria: categoriaSeleccionada
                },
                dataType: 'html',
                success: function(data) {


                    // Eliminar el contenido actual del carrusel
                    $('#rotilo').empty();
                    // Actualizar el contenido de owl-carousel2 con los nuevos resultados
                    $('#rotilo').html(data);

                    // Reinicializar el carrusel
                    $('.owl-carousel2').owlCarousel({
                        loop: true, // Bucle infinito
                        autoplay: true, // Activar la reproducción automática
                        autoplayTimeout: 5000, // Establecer el tiempo en milisegundos entre cada movimiento (en este ejemplo, 5 segundos)
                        responsive: {
                            0: {
                                items: 1
                            }, // Muestra 2 elementos en pantallas pequeñas
                            768: {
                                items: 3
                            }, // Muestra 3 elementos en pantallas medianas
                            992: {
                                items: 3
                            }, // Muestra 4 elementos en pantallas grandes
                            // Agrega más breakpoints y ajusta la cantidad de elementos según se necesite
                        },
                    });

                },
                error: function(error) {
                    console.error('Error en la solicitud AJAX: ', error);
                }
            });
        }

        // Al hacer clic en el enlace con la clase .details-link
        $(document).on('click', '.media-29103', function(e) {
            e.preventDefault();
            // Obtener el ID del expositor desde el atributo data-id
            var pokemonId = $(this).data('id');
            updateModal(pokemonId);
        });


        async function fetchPokemonData(pokemonId) {

            const url = `https://pokeapi.co/api/v2/pokemon/${pokemonId}`;

            const response = await fetch(url);
            const data = await response.json();
            return data;
        }

        async function updateModal(pokemonId) {
            const pokemonData = await fetchPokemonData(pokemonId);
            // Actualizar Imagen
            const imgElement = document.getElementById("update_img");
            imgElement.src = imgElement.src = 'assets/img/pokemons/poke_' + pokemonId + '.gif';

            // Actualizar nombre
            const nameElement = document.getElementById("update_name");
            nameElement.textContent = pokemonData.name;

            // Actaulizar elementos basados en el data:
            document.getElementById("update_hp").textContent = `HP ${pokemonData.stats[0].base_stat}/${pokemonData.stats[0].base_stat}`;
            document.getElementById("update_cp").textContent = `XP ${pokemonData.base_experience}`;
            document.getElementById("update_type").textContent  = '-';
			
			const typeElement = document.getElementById("update_type");
				if (pokemonData.types.length > 0) {
					typeElement.textContent = '-';
					
				} else {
					typeElement.textContent = '-';
				}
			
			
            document.getElementById("update_weight").textContent = `${pokemonData.weight / 10}kg`;
            document.getElementById("update_height").textContent = `${pokemonData.height / 10}m`;
            document.getElementById("update_stardust").textContent = pokemonData.base_experience;
			
			
			
			

        }
        document.getElementById('cerrarModalBtn').addEventListener('click', function() {
            // Cierra el modal por su ID
            var modal = document.getElementById('modalExpositor');
            modal.classList.remove('show');
            modal.style.display = 'none';

            // Oculta el fondo oscuro (sombra)
            var modalBackdrop = document.querySelector('.modal-backdrop');
            if (modalBackdrop) {
                modalBackdrop.style.display = 'none';
            }
        });
    });
	
	
	
	
	
	
	
	// Actualizar tipo


	
	
	
	
	
	
	
</script>