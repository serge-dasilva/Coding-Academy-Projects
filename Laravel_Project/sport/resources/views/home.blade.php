@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
          </ol>

    
          <div class="carousel-inner">
            <div class="item active">
              .<img src="img/quidditch.jpg" alt="Quidditch">
            </div>

            <div class="item">
              <img src="img/Quidditch_Terrain.jpg" alt="Quidditch_Terrain">
            </div>
          </div>

       
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="sr-only">Précédant</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="sr-only">Suivant</span>
          </a>
        </div><br>
        <div class="card mb-4">
            <div class="card-body">
                <p class="card-text">Le Quidditch, le « sport des sorciers », est le premier sport du Monde Magique. Tout le monde s’y intéresse. Le Quidditch est un jeu rapide, dangereux et excitant à la fois, dans lequel deux équipes volant sur des balais essaient de gagner des points en lançant une balle – le Souafle – à travers des cercles placés à chaque extrémité d’un large terrain recouvert d’herbe. Ce sport peut être pratiqué par des enfants dans le verger derrière la maison, mais aussi par des équipes composées d’étudiants à Poudlard, et par des athlètes professionnels dont les exploits sont suivis avidement par le monde entier. La Coupe du Monde de Quidditch attire d’ailleurs des centaines de milliers de fans. C’est une sorte de croisement entre le basket et le football moldus, mais en mieux.

                Le Quidditch est sous la juridiction du Département des jeux et sports magiques du ministère de la Magie. Lors des matches professionnels sont toujours présents des Médicomages, et bien qu’il y ait surtout des blessures, on peut constater aussi quelques morts à cause de divers accidents. Certains arbitres aussi ont déjà disparu complètement, puis sont réQuidditcharus des semaines plus tard au milieu du Sahara. On a recensé une liste de sept cent fautes possibles au Quidditch, et l’on sait qu’elles ont toutes été commises lors de la finale de la Coupe du Monde en 1473. Le match opposait la Flandre et la Transylvanie.

                Le mot « Quidditch » provient de « Queerditch », des Marais de Queerditch, l’endroit où le jeu est Quidditcharu au 11e siècle. L’histoire complète et surprenante de ce sport millénaire est détaillée dans l’excellent livre  Le Quidditch à travers les Ages, disponible en édition moldue. L’Encyclopédie ne donne pas toutes les informations présentes dans ce livre car les revenus de sa vente vont à Comic Relief, une association caritative. Il vous est donc conseillé d’acheter un exemplaire.</p>
            </div>
            <div class="card-footer text-muted">
                Ecrit le 12 décembre, 2017 par
                <a href="#">Quidditch</a>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
