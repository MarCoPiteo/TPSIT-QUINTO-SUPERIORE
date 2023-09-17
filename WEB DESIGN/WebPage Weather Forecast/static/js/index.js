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

        let temperatureList = document.querySelector(".list-group")

        for (let i = 0; i < 10; i++) {
            let temperatureElement = document.createElement("li")

            temperatureElement.classList.add("list-group-item")
            temperatureElement.innerHTML = `${data.hourly.time[i]} --> ${data.hourly.temperature_2m[i]}`
            //console.log(temperatureElement)
            temperatureList.appendChild(temperatureElement)
        }
    })
})