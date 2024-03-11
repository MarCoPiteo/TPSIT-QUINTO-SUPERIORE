//FARE UNA FUNZIONE PER SCEGLIERE LA CITTA SCRIVENDOLA, MAGARI QUALCUNO NON SA LE COORDINATE E VUOLE USARE LA CITTA
//SE LE COORDINATE SONO RESETTATE (0, 0), LA MAPPA RIDUCE LO ZOOM AL MINIMO 

let latInput = document.querySelector("#lat")
let lngInput = document.querySelector("#lng")
let localityInput = document.querySelector("#locality")


navigator.geolocation.getCurrentPosition (
    function (event) {
        let userLat = event.coords.latitude
        let userLng = event.coords.longitude

        console.log("L'utente ha accettato la geolocalizzazione")

        latInput.value = userLat
        lngInput.value = userLng

        createMap(userLat, userLng)
    }, function (event) {
        console.log("L'utente non ha accettato la geolocalizzazione")

        createMap(40.71427, -74.00597) //COORDINATE PREDEFINITE: NEW YORK
    }
)


//CAPIRE COME FAR MUOVERE LA MAPPA SOLO ALLA FINE DELLA MODIFICA DEL CAMPO DI INPUT
document.querySelectorAll("input[type=text]").forEach(field => {
    field.addEventListener("input", function(e) {
        setTimeout(() => {
            //console.log(e)

            moveMarker(latInput.value, lngInput.value)    
        }, 2500);
        
    })
}) 


document.querySelector(".weatherForm").addEventListener("submit", function (event) {
    event.preventDefault()

    /*let animationDivList = document.querySelector(".listContainer")
    animationDivList.classList.add("animation")*/

    let latitudine = latInput.value
    let longitudine = lngInput.value

    //console.log(latitudine, longitudine)

    let url = `https://api.open-meteo.com/v1/forecast?latitude=${latitudine}&longitude=${longitudine}&hourly=temperature_2m,relativehumidity_2m,precipitation_probability,windspeed_10m`
    //console.log(url)


    fetch(url).then(function (resp) {
        return resp.json()
    }).then(function (data) {
        //console.log(data)
        //console.log(data.hourly)
        //console.log(data.hourly.time)
        //console.log(data.hourly.temperature_2m)


        




    })
})




//TEMPERATURE LIST

        /*const listMaxLength = 10
        let temperatureList = document.querySelector(".list-group")

        //UL LENGTH CHECK
        let listElement = document.querySelectorAll(".list-group-item")

        if (listElement.length !== 0) {
            for (i = 0; i < listMaxLength; i++) {
                temperatureList.removeChild(listElement[i])
            }
        }

        for (let i = 0; i < listMaxLength; i++) {
            //setTimeout(() => {
                let temperatureElement = document.createElement("li")
                
                //CHIEDERE COME FARE PER DIVIDERE LE TEMPERATURE SENZA IL MARGIN
                temperatureElement.classList.add("list-group-item", "rounded-pill", "text-white", /*"me-2"*, 
                "mb-1", "flex-grow-1", "border", "border-white")
                temperatureElement.innerHTML = `Il "${data.hourly.time[i]}" ci saranno ${data.hourly.temperature_2m[i]}°`

                //console.log(temperatureElement)

                temperatureList.appendChild(temperatureElement)
            //}, 1000);
        }*/