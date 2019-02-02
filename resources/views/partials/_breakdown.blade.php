<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-scale" aria-hidden="true"></span> Points Breakdown
    </div>

    <div class="panel-body">
        <div class="col-md-4 text-primary text-center">
            <h1 style="margin: 5px;">{{ Auth::user()->progressionPoints() }}</h1>
            <h3 style="margin: 0; font-variant: small-caps;">Progression</h3>
        </div>
        <div class="col-md-4 text-primary text-center">
            <h1 style="margin: 5px;">{{ Auth::user()->soaringPoints() }}</h1>
            <h3 style="margin: 0; font-variant: small-caps;">Soaring</h3>
        </div>
        <div class="col-md-4 text-primary text-center">
            <h1 style="margin: 5px;">{{ Auth::user()->crossCountryPoints() }}</h1>
            <h3 style="margin: 0; font-variant: small-caps;">Cross Country</h3>
        </div>
    </div>
</div>
