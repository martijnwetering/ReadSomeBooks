<div id="content" class="over-ons">
    <div class="koptekst">
        <h1>Over Ons</h1>
    </div>
    <div class="info">
        <h2>Wie zijn wij</h2>
        <img src=../img/ReadSomeBooksStore.jpg alt="Read Some Books Store" />
        <p>
            Read Some Books is een geweldig leuke nieuwe boekenwinkel in hartje
            Anrhem. Wij hebben een groot aanbod boeken in allerlei categorie&euml;n.
            Zo kun je bij ons terecht voor de allerlaatse thrillers, fanatsy, drama
            en aktie boeken. Ook organiseren wij elke maand een evenement waarbij
            een bekende auteur aanwezig is. Maar aangezien iedereen tegenwoordig
            steeds drukker is focussen wij ook veel van onze aandacht op onze
            webshop. Alle boeken uit de winkel plus nog vele andere zijn te
            bestellen via onze webshop. Als je op werkdagen <b>voor 09.00 uur</b>
            besteld dan wordt je bestelling de volgende dag al bezorgd.
        </p>
        <div class="clearfix"></div>
    </div>
    <div class="info">
        <h2 class="content-h2">Routebeschrijving</h2>
        <div id="map-canvas"></div>
        <p>
            Read Some books is gevestigd in hartje Arnhem. Wij zijn geopend op alle
            werkdagen en zaterdag van 09.00 tot 18.00 uur. Op donderdag zijn wij zelfs
            geopend tot 21.00 uur. De winkel is gemakkelijk te bereiken met het openbaar
            vervoer, zo'n 5 minuten lopen vanaf het centraal station in Arnhem. Tevens
            is er veel pakkeergelegenheid in de binnenstad van Arnhem mocht je met de
            auto komen.
        </p>
        <div class="clearfix"></div>
    </div>
</div>


<script>
    function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
            center: new google.maps.LatLng(51.9826908,5.9064607),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

