let marker
let map

function createMap(lat, lng) {
    map = L.map('map').setView([lat, lng], 13); //L è una variabile speciale che rappresenta proprio leaflet

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    addMarker(lat, lng)

    
    let markerLocality
    
    map.on("click", async function(e) {
        //console.log(e)
    
        let markerLat = e.latlng.lat
        let markerLng = e.latlng.lng

        addMarker(markerLat, markerLng)

    
        let position = await checkLocation(e.latlng.lat, e.latlng.lng)
    
        markerLocality = formatLocation(position)
        //console.log(markerLocality)
    
        
    })
}


function formatLocation(locality){
    //console.log(locality)

    return `${locality.city}, ${locality.countryName}`
}

function addMarker(markerLat, markerLng) {
   //console.log(marker)
    if (marker != undefined) {
        marker.remove()
    }

    marker = L.marker([markerLat, markerLng]).addTo(map)

    latInput.value = markerLat
    lngInput.value = markerLng
}

function moveMarker(userInputLat, userInputLng) {
    //console.log(userInputLat)

    map.flyTo([userInputLat, userInputLng])

    addMarker(userInputLat, userInputLng)
}