let marker
let map
let markerLocality


function createMap(lat, lng) {
    map = L.map('map').setView([lat, lng], 13); //L è una variabile speciale che rappresenta proprio leaflet

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    addMarker(lat, lng)

    
    map.on("click", function(e) {
        //console.log(e)
    
        let markerLat = e.latlng.lat
        let markerLng = e.latlng.lng

        addMarker(markerLat, markerLng)
    })
}


function formatLocation(locality){
    //console.log(locality)

    if (locality.city !== "" || locality.city) {
        return `${locality.city}, ${locality.countryName}`
    } else if (locality.countryName === "" || locality.city && locality.countryName === undefined) {
        return "Località non definibile"
    } else {
        return `${locality.locality}, ${locality.countryName}`
    }
}

async function addMarker(markerLat, markerLng) {
   //console.log(marker)
    if (marker != undefined) {
        marker.remove()
    }

    marker = L.marker([markerLat, markerLng]).addTo(map)

    latInput.value = markerLat
    lngInput.value = markerLng


    let position = await checkLocation(markerLat, markerLng)
    
    markerLocality = formatLocation(position)
    //console.log(markerLocality)
    
    localityInput.value = markerLocality

    /*setTimeout(() => {
        localityInput.value = markerLocality
    }, 5000);*/
}

function moveMarker(userInputLat, userInputLng) {
    //console.log(userInputLat)

    map.flyTo([userInputLat, userInputLng])

    addMarker(userInputLat, userInputLng)
}