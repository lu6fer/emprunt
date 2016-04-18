<html>
<head>
    <link rel="stylesheet" href="{{ asset('bower_components/KNACSS/css/grillade.css') }}">
    <style>
        h1 {
            color: #0086B3;
            text-align: center;
        }
        article > div {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Fiche dévalution et de suivi d'une bouteille</h1>
    </header>
    <section>
        <article>
            <h2>Bouteille</h2>
            <div class="grid-5">
                <div class="field">
                    Fabriquant : <span class="value">{{$tiv->tank->maker}}</span>
                </div>
                <div class="field">
                    Marque : <span class="value">{{$tiv->tank->brand}}</span>
                </div>
                <div class="field">
                    Model : <span class="value">{{$tiv->tank->size}}&nbsp;-&nbsp;{{$tiv->tank->model}}</span>
                </div>
                <div class="field">
                    Usage : <span class="value">{{$tiv->tank->usage}}</span>
                </div>
                <div class="field">
                    Type de filetage : <span class="value">{{$tiv->tank->buy->thread_type}}</span>
                </div>
            </div>
            <div class="grid-5">
                <div class="field">
                    Pression de service : <span class="value">{{$tiv->tank->operating_pressure}}&nbsp;bars</span>
                </div>
                <div class="field push">
                    Pression d'essaie : <span class="value">{{$tiv->tank->test_pressure}}&nbsp;bars</span>
                </div>
            </div>
            <div class="grid-5">
                <div class="field">
                    N° série fût : <span class="value">{{$tiv->tank->sn_cylinder}}</span>
                </div>
                <div class="field push">
                    N° série robineterie : <span class="value">{{$tiv->tank->sn_valve}}</span>
                </div>
            </div>
            <div class="grid-5">
                <div class="field">
                    Date qualification initiale : <span class="value">{{$tiv->tank->buy->date->format('d/m/Y')}}</span>
                </div>
                <div class="field push">
                    Date de dernière qualification : <span class="value">{{--{{$previous_tiv->review_date->format('d/m/Y')}}--}}</span>
                </div>
            </div>
        </article>
    </section>
</body>
</html>