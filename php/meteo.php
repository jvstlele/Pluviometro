
<?php

?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <title>Weather Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css"
    />
    <link rel="stylesheet" href="/climate_change_v4.2/css/stylemeteo.css" />
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.js"></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    ></script>
    <script src="/climate_change_v4.2/js/script.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.css" />

  </head>

  <body>

    <section class="hero">  

      <div class="hero-body">
        <div class="container">
          <h1 class="title">Alert Meteo</h1>
        </div>
      </div>
    </section>

    <section id="info-section">
      <div class="container">
        <div class="columns">
          <div id="colmn1" class="column is-one-quarter content">
            
            <form>
              <input
                id="city-input"
                class="input is-info"
                type="text"
                placeholder="Scrivi una città"
              />
              <button id="submit" class="button is-info" type="submit">
                Informazioni meteo
              </button>
            </form>
            <!-- list of past searched cities -->
            <div class="box table-box">
              <div class="table-container">
                <table id="cityList" class="table is-bordered">
                  <tr></tr>
                  <!-- Table data generated in javascript -->
                </table>
                <button id="clr-btn" class="button is-danger">CLEAR</button>
              </div>
            </div>
          </div>

          <!-- Space for data return from query -->
          <div class="column">
            <div id="weather-data" class="columns box content">
              <div class="column current-city-data">
                <h2 id="city-name"></h2>
                <h4 id="city-cond"></h4>
                <h4 id="temp"></h4>
                <h4 id="high"></h4>
                <h4 id="humidity"></h4>
                <h4 id="wind-speed"></h4>
                <h4 id="uv-index"></h4>
              </div>
              <div class="column">
                <div id="icon"></div>
              </div>
            </div>
            <!-- Forecast cards -->
            <div class="container">
              <div class="content">
                <h2>Previsioni a 5gg:</h2>
                <div class="columns">
                  <div class="column card">
                    <div id="day1" class="card-content">
                      <h3 id="date1" class="has-text-white"></h3>
                      <div id="icon1"></div>
                      <h4 id="temp1" class="has-text-white"></h4>
                      <h4 id="hum1" class="has-text-white"></h4>
                    </div>
                  </div>
                  <div class="column card">
                    <div id="day2" class="card-content">
                      <h3 id="date2" class="has-text-white"></h3>
                      <div id="icon2"></div>
                      <h4 id="temp2" class="has-text-white"></h4>
                      <h4 id="hum2" class="has-text-white"></h4>
                    </div>
                  </div>
                  <div class="column card">
                    <div id="day3" class="card-content">
                      <h3 id="date3" class="has-text-white"></h3>
                      <div id="icon3"></div>
                      <h4 id="temp3" class="has-text-white"></h4>
                      <h4 id="hum3" class="has-text-white"></h4>
                    </div>
                  </div>
                  <div class="column card">
                    <div id="day4" class="card-content">
                      <h3 id="date4" class="has-text-white"></h3>
                      <div id="icon4"></div>
                      <h4 id="temp4" class="has-text-white"></h4>
                      <h4 id="hum4" class="has-text-white"></h4>
                    </div>
                  </div>
                  <div class="column card">
                    <div id="day5" class="card-content">
                      <h3 id="date5" class="has-text-white"></h3>
                      <div id="icon5"></div>
                      <h4 id="temp5" class="has-text-white"></h4>
                      <h4 id="hum5" class="has-text-white"></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   
    <div id="map"></div>

  </body>
</html>

<!-- End of line -->