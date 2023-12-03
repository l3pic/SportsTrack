<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->weatherModel = $this->model('Weather');
    }

    // Default method
    public function index()
    {
        if (isset($_SESSION['location'])) {
            $lat = $_SESSION['location']['lat'];
            $lon = $_SESSION['location']['lon'];
            $weatherdata = $this->weatherModel->getWeatherByLatLon($lat, $lon);
            $city = $this->weatherModel->getCityByGeo($lat, $lon);

            $data = [
                'weather' => $weatherdata,
                'city' => $city,
                'lat' => $lat,
                'lon' => $lon,
            ];
        } else {
            $data = [];
        }

        $this->view('pages/index', $data);
    }

    public function weather($lat = null, $lon = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $lat == null && $lon == null) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $city = trim($_POST['city']);
            $city = strtolower($city);
            $city = ucfirst($city);

            $geo = $this->weatherModel->getGeoByCity($city);

            if (empty($geo)) {
                $data = [
                    'error' => 'Stadt nicht gefunden',
                ];

                $this->view('pages/weather', $data);
                exit();
            }

            $lat = $geo[0]->lat;
            $lon = $geo[0]->lon;
        }

        $weatherdata = $this->weatherModel->getWeatherByLatLon($lat, $lon);
        $city = $this->weatherModel->getCityByGeo($lat, $lon);

        $data = [
            'weather' => $weatherdata,
            'city' => $city,
            'lat' => $lat,
            'lon' => $lon,
        ];

        $this->view('pages/weather', $data);
    }

    public function hourforecast($lat = null, $lon = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $lat == null && $lon == null) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $city = trim($_POST['city']);
            $city = strtolower($city);
            $city = ucfirst($city);

            $geo = $this->weatherModel->getGeoByCity($city);

            if (empty($geo)) {
                $data = [
                    'error' => 'Stadt nicht gefunden',
                ];

                $this->view('pages/weather', $data);
                exit();
            }

            $lat = $geo[0]->lat;
            $lon = $geo[0]->lon;
        }

        $weatherdata = $this->weatherModel->getWeatherByLatLon($lat, $lon);
        $city = $this->weatherModel->getCityByGeo($lat, $lon);

        $data = [
            'weather' => $weatherdata,
            'city' => $city,
            'lat' => $lat,
            'lon' => $lon,
        ];

        $this->view('pages/hourforecast', $data);
    }

    public function dayforecast($lat = null, $lon = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $lat == null && $lon == null) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $city = trim($_POST['city']);
            $city = strtolower($city);
            $city = ucfirst($city);

            $geo = $this->weatherModel->getGeoByCity($city);

            if (empty($geo)) {
                $data = [
                    'error' => 'Stadt nicht gefunden',
                ];

                $this->view('pages/weather', $data);
                exit();
            }

            $lat = $geo[0]->lat;
            $lon = $geo[0]->lon;
        }

        $weatherdata = $this->weatherModel->getWeatherByLatLon($lat, $lon);
        $city = $this->weatherModel->getCityByGeo($lat, $lon);

        foreach ($weatherdata->daily as $dayid => $day) {
            $dayname = date('w', $day->dt);
            $weatherdata->daily[$dayid]->dt = $this->germanDayNames[$dayname] . ' ' . date('d.m.Y', $day->dt);
        }

        $data = [
            'weather' => $weatherdata,
            'city' => $city,
            'lat' => $lat,
            'lon' => $lon,
        ];

        $this->view('pages/dayforecast', $data);
    }

}