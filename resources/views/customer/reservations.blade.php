@extends('layouts.customer')

@section('pageTitle', 'Mes réservations | '.env('APP_NAME'))

@section('content')

<div class="site-section bg-light">
    <div class="container">
        <h2>
            <a href="{{ url('/account/dashboard') }}">Mon compte</a> > Mes réservations
        </h2>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="passees-tab" data-toggle="tab" href="#passees" role="tab">Passées</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="enCours-tab" data-toggle="tab" href="#enCours" role="tab">En cours ({{ count($reservationsEnCours) }})</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="passees" role="tabpanel">
                <table class="table">
                    <tr>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Spa</th>
                        <th>Pack</th>
                        <th>Nb accessoire</th>
                        <th>Montant</th>
                        <th></th>
                    </tr>
                    @if(count($reservationsPassees) > 0)
                        @foreach($reservationsPassees as $reservationPassee)
                            <tr>
                                <td>{{ $reservationPassee->dateDebut->format('d/m/Y') }}</td>
                                <td>{{ $reservationPassee->dateFin->format('d/m/Y') }}</td>
                                <td>{{ $reservationPassee->reservation_spa_libelle }}</td>
                                <td>{{ $reservationPassee->pack->pack_libelle }}</td>
                                <td class="text-center">{{ count($reservationPassee->accessoires) }}</td>
                                <td class="text-right">{{ $reservationPassee->reservation_montant_total }}€</td>
                                <td class="text-right">
                                    <a href="{{ url('/account/reservation/detail/'.$reservationPassee->reservation_id) }}" class="btn btn-primary">Détails</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
            <div class="tab-pane fade" id="enCours" role="tabpanel">
                <table class="table">
                    <tr>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Spa</th>
                        <th>Pack</th>
                        <th>Nb accessoire</th>
                        <th>Montant</th>
                        <th></th>
                    </tr>
                    @if(count($reservationsEnCours) > 0)
                        @foreach($reservationsEnCours as $reservationEnCours)
                            <tr>
                                <td>{{ $reservationEnCours->dateDebut->format('d/m/Y') }}</td>
                                <td>{{ $reservationEnCours->dateFin->format('d/m/Y') }}</td>
                                <td>{{ $reservationEnCours->reservation_spa_libelle }}</td>
                                <td>{{ $reservationEnCours->pack->pack_libelle }}</td>
                                <td class="text-center">{{ count($reservationEnCours->accessoires) }}</td>
                                <td class="text-right">{{ $reservationEnCours->reservation_montant_total }}€</td>
                                <td class="text-right">
                                    <a href="{{ url('/account/reservation/detail/'.$reservationEnCours->reservation_id) }}" class="btn btn-primary">Détails</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
