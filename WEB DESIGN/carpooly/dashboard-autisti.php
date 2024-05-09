<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Autista</title>
    <script src="https://kit.fontawesome.com/af6ecfa2ff.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./static/css/dashboard-autisti.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <img src="./static/img/img/images.png" alt="BlaBlaCar Logo" width="145" height="87">
                </div>
                <div class="title">
                    <h1>Dashboard Autista</h1>
                </div>
                <div style="display: flex; align-items:center;">
                <?php if (isset($_GET['name'])): ?>
                    <i style="margin-right: 10px;" class="fas fa-user"></i>
                    <h1 class="user-name">Ciao <?php echo $_GET['name']; ?></h1>
                <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <section class="content">
    <div class="container">
        <div class="registration-section">
            <form action="./register-travel.php" method="post">
                <div class="slide active" id="slide1">
                    <h2>Registrazione del Viaggio - Informazioni di Viaggio</h2>
                    <div class="form-group">
                        <label for="departure_city_input">Città di Partenza:</label>
                        <input type="text" id="departure_city_input" name="departure_city" required>
                    </div>
                    <div class="form-group">
                        <label for="destination_city_input">Città di Destinazione:</label>
                        <input type="text" id="destination_city_input" name="destination_city" required>
                    </div>
                    <div class="form-group">
                        <label for="travel_date_input">Data di Viaggio:</label>
                        <input type="date" id="travel_date_input" name="travel_date" required>
                    </div>
                    <div class="form-group">
                        <label for="passengers_input">Numero di Passeggeri:</label>
                        <input type="number" id="passengers_input" name="passengers" required>
                    </div>
                    <button style="float: right;" type="button" class="next-button">Avanti</button>
                </div>

                <div class="slide" id="slide2">
                    <h2>Registrazione del Viaggio - Caratteristiche del Veicolo</h2>
                    <div class="form-group">
                        <label for="car_model_input">Modello del Veicolo:</label>
                        <input type="text" id="car_model_input" name="car_model" required>
                    </div>
                    <div class="form-group">
                        <label for="license_plate_input">Targa:</label>
                        <input type="text" id="license_plate_input" name="license_plate" required>
                    </div>
                    <div class="form-group">
                        <label for="car_color_input">Colore del Veicolo:</label>
                        <input type="text" id="car_color_input" name="car_color" required>
                    </div>
                    <div class="form-group">
                        <label for="car_year_input">Anno del Veicolo:</label>
                        <input type="number" id="car_year_input" name="car_year" required>
                    </div>
                    <div class="form-group">
                        <label for="total_seats_input">Numero totale di Posti del Veicolo:</label>
                        <input type="number" id="total_seats_input" name="total_seats" required>
                    </div>
                    <div class="form-group">
                        <label for="available_seats_input">Numero di Posti Disponibili del Veicolo:</label>
                        <input type="number" id="available_seats_input" name="available_seats" required>
                    </div>
                    <button style="float: left;" type="button" class="previous-button">Indietro</button>
                    <button style="float: right;" type="button" class="next-button">Avanti</button>
                </div>

                <div class="slide" id="slide3">
                    <h2>Riepilogo del Viaggio</h2>
                    <div class="summary">
                        <h2>Riepilogo del Viaggio</h2>
                        <p><strong>Città di Partenza:</strong> <span id="departure_city"></span></p>
                        <p><strong>Città di Destinazione:</strong> <span id="destination_city"></span></p>
                        <p><strong>Data del Viaggio:</strong> <span id="travel_date"></span></p>
                        <p><strong>Passeggeri:</strong> <span id="passengers"></span></p>
                        <h3>Dettagli del Veicolo</h3>
                        <p><strong>Modello del Veicolo:</strong> <span id="car_model_summary"></span></p>
                        <p><strong>Targa:</strong> <span id="license_plate_summary"></span></p>
                        <p><strong>Colore del Veicolo:</strong> <span id="car_color_summary"></span></p>
                        <p><strong>Anno del Veicolo:</strong> <span id="car_year_summary"></span></p>
                        <p><strong>Numero totale di Posti del Veicolo:</strong> <span id="total_seats_summary"></span></p>
                        <p><strong>Numero di Posti Disponibili del Veicolo:</strong> <span id="available_seats_summary"></span></p>
                    </div>
                    <div class="BtnGroup">
                        <button style="float: left;" type="button" class="previous-button">Indietro</button>
                        <button type="button" class="submit-button">Visualizza Il Riepilogo</button>
                        <button type="submit">Pubblica</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="map"></div>
    </div>
</section>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="./static/js/script.js"></script>
    <script src="./static/js/rider.js"></script>
</body>
</html>