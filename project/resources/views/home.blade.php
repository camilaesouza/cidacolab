@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('storage/slideHome.png') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('storage/slideHome2.png') }}" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>

        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://www.kindpng.com/picc/m/171-1713478_png-texto-lupa-transparent-png.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Veja as denúncias</h5>
                                <p class="card-text">No cidaColab você pode ver as denuncias ja feitas
                                    sobre os problemas em sua cidade!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://img.flaticon.com/icons/png/512/174/174240.png?size=1200x630f&pad=10,10,10,10&ext=png&bg=FFFFFFFF" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Faça suas proprias denuncias</h5>
                                <p class="card-text">Cadastre suas proprias denuncias pelo nosso sistema!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://mundogeo.com/wp-content/uploads/2015/11/googleMaps_transito.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Veja o mapa</h5>
                                <p class="card-text">Pelo nosso mapa é possivel vê melhor todas as denuncias!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
