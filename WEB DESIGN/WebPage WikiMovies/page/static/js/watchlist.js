var backButton = document.querySelector('.back-button');

backButton.addEventListener('click', function() {
    window.history.back();
});


function createFilmCard(film) {
    var filmCard = document.createElement('a');
    filmCard.classList.add('film-card', 'flex', 'link');
    /*<a class="film-card flex link">*/

    var filmImage = document.createElement('img');
    filmImage.src = film.imageUrl;
    filmImage.alt = film.title;
    filmImage.classList.add('film-card-image');

    var filmInfo = document.createElement('div');
    filmInfo.classList.add('film-card-information', 'flex');

    var filmTitle = document.createElement('h3');
    filmTitle.classList.add('film-card-title');
    filmTitle.textContent = film.title;

    var filmDetails = document.createElement('div');
    filmDetails.classList.add('film-card-details', 'flex');

    function createFilmDetail(iconName, text, additionalClasses = []) {
        var detailDiv = document.createElement('div');
        detailDiv.classList.add('film-card-rating', 'flex');
        if (additionalClasses.length > 0) {
            detailDiv.classList.add(...additionalClasses);
        }

        var icon = document.createElement('i');
        icon.classList.add('material-icons', 'information-icon');
        icon.textContent = iconName;

        var detailText = document.createElement('h4');
        detailText.classList.add('information-text');
        if (additionalClasses.length > 0) {
            detailText.classList.add(...additionalClasses);
        }
        detailText.textContent = text;

        detailDiv.appendChild(icon);
        detailDiv.appendChild(detailText);
        return detailDiv;
    }

    // Creare e aggiungere i dettagli del film
    filmDetails.appendChild(createFilmDetail('star', film.rating, ['rating-style']));
    filmDetails.appendChild(createFilmDetail('confirmation_number', film.genre));
    filmDetails.appendChild(createFilmDetail('calendar_today', film.year));
    filmDetails.appendChild(createFilmDetail('schedule', film.duration));

    // Aggiungere gli elementi al div .film-card-information
    filmInfo.appendChild(filmTitle);
    filmInfo.appendChild(filmDetails);

    // Aggiungere l'immagine e il div .film-card-information al link principale
    filmCard.appendChild(filmImage);
    filmCard.appendChild(filmInfo);

    return filmCard;
}

// Esempio di utilizzo
var film = {
    title: "Fight Club",
    imageUrl: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfj-Xxr1DlcuFjU4Nj0ZHm2rmEn0e7BBU0xQZzQedaWODnFw7Q",
    rating: "9.5",
    genre: "Action",
    year: "2005",
    duration: "135min"
};

// Selezionare il contenitore principale dove verranno aggiunte le schede dei film
var watchlistContainer = document.querySelector('.watchlist-container');
watchlistContainer.appendChild(createFilmCard(film));

// Se hai una lista di film
var films = [/* Array di oggetti film */];
films.forEach(function(film) {
    watchlistContainer.appendChild(createFilmCard(film));
});