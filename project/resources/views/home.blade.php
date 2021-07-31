@extends('layouts.app')

@section('content')
    <img width="100%" src="https://uaportuguese.files.wordpress.com/2015/04/viagem-pelo-mundo.jpg?w=1000" alt="mundo">

    <div class="container">
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
                            <img src="https://omd.com.br/wp-content/uploads/2019/08/2019-AGOSTO-1-IMAGEM.png" class="card-img-top" alt="...">
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
