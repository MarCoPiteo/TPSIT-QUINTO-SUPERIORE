<?php
    include_once './login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Passeggero</title>
    <link rel="stylesheet" href="./static/css/dashboard-passenger.css">
    <script src="https://kit.fontawesome.com/af6ecfa2ff.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <img src="./static/img/img/images.png" alt="BlaBlaCar Logo" width="145" height="87">
                </div>
                <div class="nav-links">
                    <a href="search-ride.html"><i class="fas fa-magnifying-glass"></i> Cerca</a>
                    <a href="offer-ride.html"><i class="fas fa-hand-holding-heart"></i> Offri un passaggio</a>
                    <div class="folder-user">
                        <div class="user-icon">
                            <a href="#" onclick="toggleMenu(event)">
                                <i class="fas fa-user"></i>
                            </a>
                        </div>
                        <i class="fas fa-chevron-down" id="icon"></i>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="menu" id="menu">
    <?php if (isset($_GET['name'])): ?>
                    <h1 class="user-name">Ciao <?php echo $_GET['name']; ?></h1>
                <?php endif; ?>

        <div class="menu-item">
            <i class="fas fa-car"></i> <span>I tuoi viaggi</span>
        </div>
        <div class="menu-item">
            <i class="fas fa-user"></i> <span>Il tuo profilo</span>
        </div>
        <div class="menu-item">
            <i class="fas fa-sign-out-alt"></i> <span>Esci</span>
        </div>
    </div>

    <section>
        <div class="content-image">
            <img class="img" src="https://cdn.blablacar.com/kairos/assets/images/carpool_blablabus_large-e3d8eff32c13cdafc080.svg" alt="" height="100%" width="100%" loading="eager" decoding="sync" fetchpriority="high">
            <h1 class="content-title">La tua selezione di viaggi dal prezzo accessibile</h1>
        </div>
        <div class="search-ride-input">
            <form class="searching-form" action="search-ride.php" method="post">
                <div class="departure">
                    <label for="departure">
                        <i class="fa-solid fa-plane-departure"></i>
                    </label>
                    <input type="text" placeholder="Inserire città di partenza..." class="departure-input" id="departure" name="departure">
                </div>
                <div class="destination" style="position: relative;">
                    <label for="destination">
                        <i class="fa-solid fa-plane-arrival"></i>
                    </label>
                    <input type="text" placeholder="Inserire città di destinazione..." class="destination-input" id="destination" name="destination">
                </div>
                <div id="date-date" class="date">
                    <div class="content-btn-date">
                        <i class="fa-solid fa-calendar-days"></i>
                        <input style="width: 100px;" class="date-txt" id="date" name="date" placeholder="Oggi">
                    </div>
                </div>
                <div id="passenger-passenger" class="passenger">
                    <div class="content-btn-passenger">
                        <i class="fa-regular fa-user"></i>
                        <input style="width: 100px;" class="passenger-txt" id="passenger" name="passenger" placeholder="Passegero">
                    </div>
                </div>
                <div class="search">
                    <button type="submit" class="search-btn" id="search-btn">
                        Trova
                    </button>
                </div>
            </form>
        </div>

        <div class="citta-corrispondenti departure-corrispondenti"></div>
        <div class="citta-corrispondenti destination-corrispondenti"></div>
        <div id="calendario">
            <div class="format-date">
                <div class="content-date">
                    <div id="Aprile">
                        <div class="row-title">
                            <div>&nbsp;</div>
                            <div class="title-date">
                                <span> Aprile </span>
                            </div>
                            <div class="icon-date">
                                <button id="AprilBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <table class="table-date" role="grid">
                            <thead>
                                <tr class="days-name">
                                    <th class="number" scope="col">
                                        Lun
                                    </th>
                                    <th class="number" scope="col">
                                        Mar
                                    </th>
                                    <th class="number" scope="col">
                                        Mer
                                    </th>
                                    <th class="number" scope="col">
                                        Gio
                                    </th>
                                    <th class="number" scope="col">
                                        Ven
                                    </th>
                                    <th class="number" scope="col">
                                        Sab
                                    </th>
                                    <th class="number" scope="col">
                                        Dom
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>1</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>2</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>3</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>4</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>5</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>6</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>7</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>8</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>9</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>10</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>11</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>12</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>13</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>14</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>15</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>16</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>17</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>18</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>19</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>20</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>21</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>22</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>23</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>24</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>25</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>26</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>27</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>28</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>29</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>30</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>31</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="Maggio">
                        <div class="row-title">
                        <div class="icon-date">
                                <button id="MayBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            </div>
                            <div class="title-date">
                                <span> Maggio </span>
                            </div>
                            <div class="icon-date">
                                <button id="MayToJuneBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <table class="table-date" role="grid">
                            <thead>
                                <tr class="days-name">
                                    <th class="number" scope="col">
                                        Lun
                                    </th>
                                    <th class="number" scope="col">
                                        Mar
                                    </th>
                                    <th class="number" scope="col">
                                        Mer
                                    </th>
                                    <th class="number" scope="col">
                                        Gio
                                    </th>
                                    <th class="number" scope="col">
                                        Ven
                                    </th>
                                    <th class="number" scope="col">
                                        Sab
                                    </th>
                                    <th class="number" scope="col">
                                        Dom
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp;</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>1</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>2</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>3</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>4</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>5</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>6</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>7</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>8</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>9</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>10</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>11</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>12</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>13</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>14</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>15</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>16</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>17</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>18</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>19</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>20</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>21</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>22</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>23</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>24</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>25</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>26</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>27</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>28</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>29</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>30</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="Giugno">
                        <div class="row-title">
                            <div class="icon-date">
                                <button id="JuneBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            </div>
                            <div class="title-date">
                                <span> Giugno </span>
                            </div>
                            <div class="icon-date">
                                <button id="JuneToJulyBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <table class="table-date" role="grid">
                            <thead>
                                <tr class="days-name">
                                    <th class="number" scope="col">
                                        Lun
                                    </th>
                                    <th class="number" scope="col">
                                        Mar
                                    </th>
                                    <th class="number" scope="col">
                                        Mer
                                    </th>
                                    <th class="number" scope="col">
                                        Gio
                                    </th>
                                    <th class="number" scope="col">
                                        Ven
                                    </th>
                                    <th class="number" scope="col">
                                        Sab
                                    </th>
                                    <th class="number" scope="col">
                                        Dom
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>1</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>2</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>3</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>4</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>5</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>6</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>7</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>8</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>9</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>10</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>11</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>12</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>13</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>14</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>15</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>16</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>17</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>18</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>19</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>20</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>21</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>22</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>23</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>24</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>25</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>26</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>27</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>28</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>29</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>30</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="Luglio">
                        <div class="row-title">
                            <div class="icon-date">
                                <button id="JulyBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            </div>
                            <div class="title-date">
                                <span> Luglio </span>
                            </div>
                            <div class="icon-date">
                                <button type="submit" class="btn-i">
                                    
                                </button>
                            </div>
                        </div>
                        <table class="table-date" role="grid">
                            <thead>
                                <tr class="days-name">
                                    <th class="number" scope="col">
                                        Lun
                                    </th>
                                    <th class="number" scope="col">
                                        Mar
                                    </th>
                                    <th class="number" scope="col">
                                        Mer
                                    </th>
                                    <th class="number" scope="col">
                                        Gio
                                    </th>
                                    <th class="number" scope="col">
                                        Ven
                                    </th>
                                    <th class="number" scope="col">
                                        Sab
                                    </th>
                                    <th class="number" scope="col">
                                        Dom
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp;</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>1</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>2</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>3</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>4</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>5</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>6</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>7</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>8</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>9</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>10</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>11</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>12</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>13</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>14</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>15</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>16</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>17</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>18</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>19</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>20</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>21</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>22</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>23</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>24</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>25</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>26</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>27</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>28</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>29</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>30</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>31</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="format-passenger">
            <div class="content-number-passenger">
                <div class="content-txt-passenger">
                    Passeggero
                </div>
                <div class="add-number-content">
                    <div class="notranslate">
                        <button class="less-btn" type="button" disabled>
                            <i class="fa-solid fa-circle-minus"></i>
                        </button>
                        <span>1</span>
                        <button class="add-btn" type="button">
                            <i class="fa-solid fa-circle-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        
    </section>

    <script src="./static/js/dashboard-passenger.js"></script>
</body>
</html>
