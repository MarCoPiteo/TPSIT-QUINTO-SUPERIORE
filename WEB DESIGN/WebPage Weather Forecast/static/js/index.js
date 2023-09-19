document.querySelector(".weatherForm").addEventListener("submit", function (event) {
    event.preventDefault()

    let animationDivList = document.querySelector(".listContainer")
    animationDivList.classList.add("animation")

    let latitudine = document.querySelector("#lat").value
    let longitudine = document.querySelector("#lng").value

    //console.log(latitudine, longitudine)

    let url = `https://api.open-meteo.com/v1/forecast?latitude=${latitudine}&longitude=${longitudine}&hourly=temperature_2m,relativehumidity_2m,precipitation_probability,windspeed_10m`
    //console.log(url)


    fetch(url).then(function (resp) {
        return resp.json()
    }).then(function (data) {
        //console.log(data)
        //console.log(data.hourly.time)
        //console.log(data.hourly.temperature_2m)

        const listMaxLength = 10
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
                temperatureElement.classList.add("list-group-item", "rounded-pill", "text-white", /*"me-2", */"mb-1", "flex-grow-1",
                "border", "border-white")
                temperatureElement.innerHTML = `${data.hourly.time[i]} --> ${data.hourly.temperature_2m[i]}`

                //console.log(temperatureElement)
                temperatureList.appendChild(temperatureElement)
            //}, 1000);
        }
    })
})