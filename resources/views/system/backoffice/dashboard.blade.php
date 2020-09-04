@extends('layouts.backoffice')

@section('pageTitle', 'Administration MF-Immobilier | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tableau de bord</h1>
<p class="mb-4"></p>

<div class="row">
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Annonces en vente active</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Session::get('nbVenteActive') }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Annonces vendu affichée</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Session::get('nbVenteVendu') }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-6 mb-4">
  <a href="{{ url('/administration/messages/list') }}">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">Message(s) non lu</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Session::get('nbNewMessage') }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <!-- <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Annonces en vente innactive</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Session::get('nbVenteInnactive') }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>
<div class="row">
    <div class="col-xl-7">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h2>Ventes</h2>
            </div>
            <div class="card-body">
                <canvas id="chartVente" style="width: 100%; height: 400px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h2>Biens par contrat</h2>
            </div>
            <div class="card-body">
                <canvas id="chartTypeContrat" style="width: 100%; height: 400px;"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    var ChartTypeContrat = new Chart(document.getElementById('chartTypeContrat').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Ventes appartements', 'Ventes maisons', 'Locations appartements', 'Locations maisons'],
            datasets: [{
                label: '# d\'annonces',
                data: [
                    {{ $nbVenteAppartement }},
                    {{ $nbVenteMaison }},
                    {{ $nbLocationAppartement }},
                    {{ $nbLocationMaison }}
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
            },{
                label: 'Vendues',
                backgroundColor: "#e6e6e6",
                data: [
                  @foreach($ventesVendues as $date => $nb)
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
