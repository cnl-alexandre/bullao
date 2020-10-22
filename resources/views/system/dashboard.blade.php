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
            labels: [
                @foreach($resasSpa as $spa => $nb)
                    '{{ $spa }}',
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach($resasSpa as $spa => $nb)
                        '{{ $nb }}',
                    @endforeach
                ],
                backgroundColor: [
                    @foreach($colors as $color)
                        '#{{ $color }}',
                    @endforeach
                ],
                borderColor: [
                    @foreach($colors as $color)
                        '#{{ $color }}',
                    @endforeach
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                position: 'right'
            }
        }
    });

    var ChartVente = new Chart(document.getElementById('chartVente').getContext('2d'), {
        type: 'line',
        data: {
            labels: [
              @foreach($ventesActives as $date => $nb)
                "{{ $date }}",
              @endforeach
            ],
            datasets: [{
                label: 'Actives',
                backgroundColor: "#000000",
                data: [
                  @foreach($ventesActives as $date => $nb)
                    "{{ $nb }}",
                  @endforeach
                ],
                fill: 'false'
            }]
        },
        options: {
            tooltips: {
                displayColors: true,
                callbacks:{
                    mode: 'x',
                },
            },
            scales: {
                xAxes: [{
                    stacked: true,
                    gridLines: {
                    display: false,
                    }
                }],
                yAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero: true,
                    },
                    type: 'linear',
                }]
            },
            responsive: true,
            maintainAspectRatio: true
        }
    });
</script>

@endsection
