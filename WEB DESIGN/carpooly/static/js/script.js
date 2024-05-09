
function creationMap(lat, lng) {
        // Crea la mappa con Leaflet
        let map = L.map('map').setView([lat, lng], 13);

        // Aggiunge un layer di tilemap da OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Aggiunge un marker alla posizione specificata
        let marker = L.marker([lat, lng]).addTo(map);
    }

    // Chiamata alla funzione creationMap con le coordinate specificate per Bari
    creationMap(41.1172, 16.8719); // Coordinate di Bari
