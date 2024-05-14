/*BACK BUTTON*/
var backButton = document.querySelector('.back-button');

backButton.addEventListener('click', function() {
    window.history.back();
});


/*WATCH LIST FILLING*/
var watchlistContainer = document.querySelector('.watch-film-container');

var films = [
    {
        title: "Fight Club",
        imageUrl: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfj-Xxr1DlcuFjU4Nj0ZHm2rmEn0e7BBU0xQZzQedaWODnFw7Q",
        rating: "9.5",
        genre: "Action",
        year: "1999",
        duration: "139min"
    },
    {
        title: "Inception",
        imageUrl: "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTKNvN1d8BSJPWenCvCOx2oOTDYqBSzjLkuDplC6Iw89KZONqnk",
        rating: "8.8",
        genre: "Sci-Fi",
        year: "2010",
        duration: "148min"
    },
    {
        title: "The Matrix",
        imageUrl: "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTKNvN1d8BSJPWenCvCOx2oOTDYqBSzjLkuDplC6Iw89KZONqnk",
        rating: "8.7",
        genre: "Action",
        year: "1999",
        duration: "136min"
    },
    {
        title: "Pulp Fiction",
        imageUrl: "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTKNvN1d8BSJPWenCvCOx2oOTDYqBSzjLkuDplC6Iw89KZONqnk",
        rating: "8.9",
        genre: "Crime",
        year: "1994",
        duration: "154min"
    },
    {
        title: "The Dark Knight",
        imageUrl: "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTKNvN1d8BSJPWenCvCOx2oOTDYqBSzjLkuDplC6Iw89KZONqnk",
        rating: "9.0",
        genre: "Action",
        year: "2008",
        duration: "152min"
    }
];


films.forEach(function(film) {
    watchlistContainer.appendChild(createFilmCard(film));
});


function createFilmCard(film) {
    var filmCard = document.createElement('a');
    filmCard.classList.add('film-card', 'flex', 'link');
    /*<a class="film-card flex link">*/


    var filmImage = document.createElement('img');
    filmImage.src = film.imageUrl;
    filmImage.alt = film.title;
    filmImage.classList.add('film-card-image');
    /*<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfj-Xxr1DlcuFjU4Nj0ZHm2rmEn0e7BBU0xQZzQedaWODnFw7Q" alt="Fight Club" class="film-card-image">*/


    var filmInfo = document.createElement('div');
    filmInfo.classList.add('film-card-information', 'flex');
    /*<div class="film-card-information flex">*/


    var filmTitle = document.createElement('h3');
    filmTitle.textContent = film.title;
    filmTitle.classList.add('film-card-title');
    /*<h3 class="film-card-title">Fight Club</h3>*/
    

    var filmDetails = document.createElement('div');
    filmDetails.classList.add('film-card-details', 'flex');
    /*<div class="film-card-details flex">*/


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


function createFilmDetail(iconName, text, additionalClasses = []) {
    var detailDiv = document.createElement('div');
    detailDiv.classList.add('film-card-rating', 'flex');
    /*<div class="film-card-rating flex">*/


    var icon = document.createElement('i');
    icon.textContent = iconName;
    icon.classList.add('material-icons', 'information-icon');
    if (additionalClasses.length > 0) {
        icon.classList.add(...additionalClasses);
    }
    /*<i class="material-icons information-icon rating-style">star</i>*/


    var iconText = document.createElement('h4');
    iconText.textContent = text;
    iconText.classList.add('information-text');
    if (additionalClasses.length > 0) {
        iconText.classList.add(...additionalClasses);
    }
    /*<h4 class="information-text rating-style">9.5</h4>*/


    detailDiv.appendChild(icon);
    detailDiv.appendChild(iconText);


    return detailDiv;
}