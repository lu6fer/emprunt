<html>
<head>
    <style>
        table {
            /*border: solid 1px black;*/
            border-collapse: collapse;
            width: 100%;
        }
        td {
            width:50%;
            padding: 5px;
            font-weight: bold;
        }
        h1 {
            color: #2f96b4;
        }
        h2 {
            color: #0e90d2;
        }
        .value {
            font-weight: normal;
        }
        .sign {
            padding: 10px;
            border: solid 1px #888;
            vertical-align: bottom;
        }
        .hight {
            padding: 15px;
        }
    </style>
</head>
<body>
    <h1>Fiche dévaluation et de suivi d'une bouteille</h1>
    <h2>Bouteille</h2>
    <table>
        <tr>
            <td>Fabriquant : <span class="value">{{$tiv->tank->maker}}</span></td>
            <td>Marque : <span class="value">{{$tiv->tank->brand}}</span></td>
            <td>Model : <span class="value">{{$tiv->tank->size}}&nbsp;-&nbsp;{{$tiv->tank->model}}</span></td>
        </tr>
        <tr>
            <td>Usage : <span class="value">{{$tiv->tank->usage}}</span></td>
            <td colspan="2">Type de filetage : <span class="value">{{$tiv->tank->buy->thread_type}}</span></td>
        </tr>
        <tr>
            <td>Pression de service : <span class="value">{{$tiv->tank->operating_pressure}}&nbsp;bars</span></td>
            <td colspan="2">Pression d'essaie : <span class="value">{{$tiv->tank->test_pressure}}&nbsp;bars</span></td>
        </tr>
        <tr>
            <td>N° série fût : <span class="value">{{$tiv->tank->sn_cylinder}}</span></td>
            <td>N° série robineterie : <span class="value">{{$tiv->tank->sn_valve}}</span></td>
        </tr>
    </table>
    <br>
    <hr />
    <h2>T.I.V. précédent</h2>
    <table>
        <tr>
            <td>Date qualification initiale : <span class="value">{{$tiv->tank->buy->date->format('d/m/Y')}}</span></td>
            <td>Date de dernière qualification :
                <span class="value">
                    @if(isset($last_test->review_date))
                        {{$last_test->review_date->format('d/m/Y')}}
                    @endif
                </span></td>
        </tr>
        <tr>
            <td colspan="2">Visiteur :
                <span class="value">
                    @if(isset($previous_tiv))
                    {{$previous_tiv->reviewer->firstname}}&nbsp;{{$previous_tiv->reviewer->lastname}}
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="2">Observations :
                <span class="value">
                    @if(isset($previous_tiv))
                    {{ $previous_tiv->comment }}
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="2">Opérations réalisées :
                <span class="value">
                    @if(isset($previous_tiv))
                    {{ $previous_tiv->performed_maintenance->value }}
                    @endif
                </span>
            </td>
        </tr>
    </table>
    <br>
    <hr>
    <h2>T.I.V.</h2>
    <table>
        <tr>
            <td>Date qualification : <span class="value">{{$tiv->review_date->format('d/m/Y')}}</span></td>
        </tr>
        <tr>
            <td>Visiteur : <span class="value">{{$tiv->reviewer->firstname}}&nbsp;{{$tiv->reviewer->lastname}}</span></td>
        </tr>
        <tr>
            <td>Observations : <span class="value">{{ $tiv->comment }}</span></td>
        </tr>
        <tr>
            <td>Opérations réalisées : <span class="value">{{ $tiv->performed_maintenance->value }}</span></td>
        </tr>
        <tr>
            <td>Décision : <span class="value">{{$tiv->decision->value}}</span></td>
        </tr>
        <tr>
            <td>Date expédition :
                <span class="value">
                    @if($tiv->shipping_date !== null)
                        {{ $tiv->shipping_date->format('d/m/Y') }}
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <td>Société :
                <span class="value">
                    @if($tiv->recipient !== null)
                    {{ $tiv->recipient->value }}
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <td>Date de retour :</td>
        </tr>
        <tr><td class="sign">Signature : </td></tr>
    </table>
    <br>
    <hr>
    <h2>Rebut</h2>
    <table>
        <tr class="hight">
            <td>Mise au rebut par : </td>
            <td>Date : </td>
            <td>Motif :</td>
        </tr>
        <tr class="hight">
            <td>Inutilisable par : </td>
            <td>Date : </td>
            <td>Motif :</td>
        </tr>
    </table>
</body>
</html>