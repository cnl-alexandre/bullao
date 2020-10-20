@extends('layouts.backoffice')

@section('pageTitle', 'Administration | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tableau de bord</h1>
<p class="mb-4"></p>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">Réservations en cours</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nbResaEnCours }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Réservations à venir</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nbResaOuvertes }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Réservations terminées</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nbResaFermees }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="text-primary">Récap des réservations</h5>
            </div>
            <div class="card-body">
                <p>Réservations en cours</p>
                <ul>
                    @if(count($detailsResaEnCours) > 0)
                        @foreach($detailsResaEnCours as $detailResa)
                        <li>Le {{ $detailResa->reservation_date_debut }} à {{ $detailResa->reservation_ville }}</li>
                        @endforeach
                    @else
                        <li>Pas de réservation</li>
                    @endif
                </ul>
                <hr>
                <p>Réservation à venir</p>
                <ul>
                    @if(count($detailsResaFutures) > 0)
                        @foreach($detailsResaFutures as $detailResa)
                        <li>Le {{ $detailResa->reservation_date_debut }} à {{ $detailResa->reservation_ville }}</li>
                        @endforeach
                    @else
                        <li>Pas de réservation</li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="text-primary">Répartition de toutes les réservations</h5>
            </div>
            <div class="card-body">
                <canvas id="chartReservationSpas" style="width: 100%; height: 400px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="text-primary">Courbe des résultats</h5>
            </div>
            <div class="card-body">
                <canvas id="chartVente" style="width: 100%; height: 400px;"></canvas>
            </div>
        </div>
    </div>
</div>


<script>
    var ChartReservationSpas = new Chart(document.getElementById('chartReservationSpas').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Spa Sahara 4p', 'Spa Navy 4p', 'Spa Baltik 4p', 'Spa Baltik 6p', 'Spa Carbone 6p'],
            datasets: [{
                data: [
                    {{ $nbResaSahara4p }},
                    {{ $nbResaNavy4p }},
                    {{ $nbResaBaltik4p }},
                    {{ $nbResaBaltik6p }},
                    {{ $nbResaCarbone6p }},
                ],
                backgroundColor: [
                    '#4aa3df',
                    '#2e8ece',
                    '#f39c12',
                    '#e67e22'
                ],
                borderColor: [
                    '#4aa3df',
                    '#2e8ece',
                    '#f39c12',
                    '#e67e22'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        }
    });
</script>

@endsection
