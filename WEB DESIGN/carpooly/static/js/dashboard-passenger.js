document.querySelector('.folder-user').addEventListener('click', function(event) {
    event.preventDefault();
    const menu = document.querySelector('#menu');
    const icon = document.querySelector('#icon');
    
    if (menu.style.display === "none" || menu.style.display === "") {
        menu.style.display = "block";
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
    } else {
        menu.style.display = "none";
        icon.classList.add('fa-chevron-down');
        icon.classList.remove('fa-chevron-up');
    }
});

function trovaCittaPerIniziale(iniziale) {
    
    const cittaItaliane = [
        "Agrigento", "Ancona", "Aosta", "Arezzo", "Ascoli Piceno", "Asti", "Avellino",
        "Bari", "Barletta", "Belluno", "Benevento", "Bergamo", "Biella", "Bologna",
        "Bolzano", "Brescia", "Brindisi",
        "Cagliari", "Caltanissetta", "Campobasso", "Carbonia", "Caserta", "Catania",
        "Catanzaro", "Chieti", "Como", "Cosenza", "Cremona", "Crotone", "Cuneo",
        "Enna",
        "Fermo", "Ferrara", "Firenze", "Foggia", "Forlì", "Frosinone",
        "Genova", "Gorizia",
        "Grosseto",
        "Imperia", "Isernia",
        "La Spezia", "L'Aquila", "Latina", "Lecce", "Lecco", "Livorno", "Lodi", "Lucca",
        "Macerata", "Mantova", "Massa", "Matera", "Messina", "Milano", "Modena", "Monza",
        "Napoli", "Novara",
        "Nuoro",
        "Olbia", "Oristano",
        "Padova", "Palermo", "Parma", "Pavia", "Perugia", "Pesaro", "Pescara", "Piacenza",
        "Pisa", "Pistoia", "Pordenone", "Potenza", "Prato",
        "Ragusa", "Ravenna", "Reggio Calabria", "Reggio Emilia", "Rieti", "Rimini", "Roma",
        "Rovigo",
        "Salerno", "Sassari", "Savona", "Siena", "Siracusa", "Sondrio", "Taranto", "Teramo",
        "Terni", "Torino", "Trapani", "Trento", "Treviso", "Trieste",
        "Udine",
        "Varese", "Venezia", "Verbania", "Vercelli", "Verona", "Vibo Valentia", "Vicenza", "Viterbo"
    ];

    const cittaTrovate = cittaItaliane.filter(citta => citta.toLowerCase().startsWith(iniziale.toLowerCase()));

    return cittaTrovate;
}


function eseguiProgramma() {
    const departureInput = document.getElementById("departure");
    const destinationInput = document.getElementById("destination");

    departureInput.addEventListener("input", function() {
        mostraCittaCorrispondenti(this.value, "departure");
    });

    destinationInput.addEventListener("input", function() {
        mostraCittaCorrispondenti(this.value, "destination");
    });

    
    document.addEventListener("click", function(event) {
        if (!event.target.closest(".citta-corrispondenti")) {
            document.querySelectorAll(".citta-corrispondenti").forEach(element => {
                element.style.display = "none";
            });
        }
    });

    document.querySelector('#date-date').addEventListener('click', function(event){
        event.preventDefault()
        const table = document.querySelector('#calendario');
        const pass = document.querySelector('.format-passenger')
    
        if(table.style.display === "none"){
            table.style.display = "block"
            pass.style.display = "none"
        } else {
            table.style.display ="none"
        }
    })
    
    document.querySelector('#passenger-passenger').addEventListener('click', function(event){
        event.preventDefault()
        const table = document.querySelector('#calendario');
        const pass = document.querySelector('.format-passenger')
    
        if(pass.style.display === "none"){
            pass.style.display = "block"
            table.style.display = "none"
        } else {
            pass.style.display = "none"
        }
    })

    document.getElementById("AprilBtn").addEventListener("click", function() {
        document.getElementById("Aprile").style.display = "none";
        document.getElementById("Maggio").style.display = "block";
    });

    document.getElementById("MayBtn").addEventListener("click", function() {
        document.getElementById("Aprile").style.display = "block";
        document.getElementById("Maggio").style.display = "none";
    });

    document.getElementById("MayToJuneBtn").addEventListener("click", function() {
        document.getElementById("Maggio").style.display = "none";
        document.getElementById("Giugno").style.display = "block";
    });

    document.getElementById("JuneBtn").addEventListener("click", function() {
        document.getElementById("Maggio").style.display = "block";
        document.getElementById("Giugno").style.display = "none";
    });

    document.getElementById("JuneToJulyBtn").addEventListener("click", function(){
        document.getElementById("Giugno").style.display = "none"
        document.getElementById("Luglio").style.display = "block"
    })

    document.getElementById("JulyBtn").addEventListener("click", function() {
        document.getElementById("Giugno").style.display = "block";
        document.getElementById("Luglio").style.display = "none";
    });
}


function mostraCittaCorrispondenti(iniziale, inputId) {
    const cittaCorrispondenti = trovaCittaPerIniziale(iniziale);

    const resultsContainer = document.querySelector(`.${inputId}-corrispondenti`);
    resultsContainer.innerHTML = "";

    if (cittaCorrispondenti.length > 0) {
        const ul = document.createElement("ul");
        cittaCorrispondenti.forEach(citta => {
            const listItem = document.createElement("li");
            listItem.textContent = citta;
            listItem.addEventListener("click", function() {
                document.getElementById(inputId).value = citta;
                resultsContainer.style.display = "none";
            });
            ul.appendChild(listItem);
        });
        resultsContainer.appendChild(ul);
        resultsContainer.style.display = "block";
    } else {
        const noResult = document.createElement("div");
        noResult.textContent = "Nessuna corrispondenza trovata";
        resultsContainer.appendChild(noResult);
        resultsContainer.style.display = "none";
    }
}

document.addEventListener("DOMContentLoaded", eseguiProgramma);

function getSelectedDate(selectedDay, currentMonth) {
    var today = new Date();
    var year = today.getFullYear();
    return selectedDay + '-' + (currentMonth < 10 ? '0' + currentMonth : currentMonth) + '-' + year;
}

function updateSelectedDate(selectedDate) {
    document.getElementById("date").innerText = selectedDate;
}

let dateButtons = document.getElementsByName("day");
for (let i = 0; i < dateButtons.length; i++) {
    dateButtons[i].addEventListener("click", function(event) {
        let selectedDay = event.target.innerText;
        let currentMonth;
        switch (event.target.closest('div[id]').id) {
            case 'Aprile':
                currentMonth = 4;
                break;
            case 'Maggio':
                currentMonth = 5;
                break;
            case 'Giugno':
                currentMonth = 6;
                break;
            case 'Luglio':
                currentMonth = 7;
                break;
            default:
                currentMonth = 4; // imposto un valore predefinito
                break;
        }
        let selectedDate = getSelectedDate(selectedDay, currentMonth);
        updateSelectedDate(selectedDate);
    });
}

// Ottieni il riferimento ai pulsanti di aggiunta e sottrazione dei passeggeri
const addButton = document.querySelector('.add-btn');
const lessButton = document.querySelector('.less-btn');

// Ottieni il riferimento allo span che mostra il numero dei passeggeri
const passengerCount = document.querySelector('.add-number-content span');

// Ottieni il riferimento al div che contiene il nome dei passeggeri
const passengerName = document.getElementById('passenger');

let numPassengers = 1;

function updatePassengerCount() {
    passengerCount.innerText = numPassengers;
    passengerName.innerText = `${numPassengers} ${numPassengers === 1 ? 'Passeggero' : 'Passeggeri'}`;
    // Cambia il testo all'interno del div content-txt-passenger
    const passengerText = document.querySelector('.content-txt-passenger');
    passengerText.innerText = ` ${numPassengers === 1 ? 'Passeggero' : 'Passeggeri'}`;
}

addButton.addEventListener('click', function() {
    numPassengers++;
    lessButton.disabled = false;
    updatePassengerCount();
});

lessButton.addEventListener('click', function() {
    if (numPassengers > 1) {
        numPassengers--;
        if (numPassengers === 1) {
            lessButton.disabled = true;
        }
        updatePassengerCount();
    }
});


