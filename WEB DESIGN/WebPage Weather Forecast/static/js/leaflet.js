var map = L.map('map').setView([41.1187, 16.852], 13); //L è una variabile speciale che rappresenta proprio leaflet

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


var marker

map.on("click", function(e) {
    //console.log(e)

    //FUNZIONE PER AGGIORNARE IL MARKER SULLA MAPPA
    if (marker != undefined) {
        map.removeLayer(marker)
    }

    marker = L.marker([e.latlng.lat, e.latlng.lng])
    map.addLayer(marker)

    let latitudine = document.querySelector("#lat").value = e.latlng.lat
    let longitude = document.querySelector("#lng").value = e.latlng.lng 
})