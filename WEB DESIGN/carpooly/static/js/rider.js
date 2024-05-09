document.addEventListener("DOMContentLoaded", function() {

    let submitButton = document.querySelector(".submit-button");
    submitButton.addEventListener("click", function() {
        // Aggiorna il riepilogo
        document.getElementById("departure_city").textContent = document.getElementById("departure_city_input").value;
        document.getElementById("destination_city").textContent = document.getElementById("destination_city_input").value;
        document.getElementById("travel_date").textContent = document.getElementById("travel_date_input").value;
        document.getElementById("passengers").textContent = document.getElementById("passengers_input").value;
        document.getElementById("car_model_summary").textContent = document.getElementById("car_model_input").value;
        document.getElementById("license_plate_summary").textContent = document.getElementById("license_plate_input").value;
        document.getElementById("car_color_summary").textContent = document.getElementById("car_color_input").value;
        document.getElementById("car_year_summary").textContent = document.getElementById("car_year_input").value;
        document.getElementById("total_seats_summary").textContent = document.getElementById("total_seats_input").value;
        document.getElementById("available_seats_summary").textContent = document.getElementById("available_seats_input").value;
    })

    // Aggiungi un event listener al cambio dei valori nei campi di input
    const inputElements = document.querySelectorAll("#slide3 input, #slide3 select");
    inputElements.forEach(input => {
        input.addEventListener("input", updateSummary);
    });

    
    // Controlliamo quando cambiamo slide
    let slides = document.querySelectorAll(".slide");
    let currentSlideIndex = 0; // Indice della slide attuale
    
    function showSlide(index) {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        // Mostra la slide corrente
        slides[index].style.display = "block";
        
        currentSlideIndex = index;
    }
    
    let nextButtons = document.querySelectorAll(".next-button");
    let prevButtons = document.querySelectorAll(".previous-button");
    
    for (let i = 0; i < nextButtons.length; i++) {
        nextButtons[i].addEventListener("click", function() {
            if (currentSlideIndex < slides.length - 1) {
                showSlide(currentSlideIndex + 1);
            }
        });
    }
    
    for (let i = 0; i < prevButtons.length; i++) {
        prevButtons[i].addEventListener("click", function() {
            if (currentSlideIndex > 0) {
                showSlide(currentSlideIndex - 1);
            }
        });
    };

    updateSummary(); // Chiamiamo la funzione per aggiornare il riepilogo quando la pagina è caricata
});
