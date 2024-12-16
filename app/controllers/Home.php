<?php
class Home extends Controller
{
    public $url;
    public $pokemonData = [];

    public function __construct()
    {
        $this->url = 'https://pokeapi.co/api/v2/pokemon/';
    }

    public function fetchPokemon($id)
    {
        $url = $this->url . $id;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);

        $data = json_decode($response, true);

        return $data;
    }

    public function setPokeDataInArray()
    {
        for ($i = 1; $i <= 6; $i++) {
            $pokemonData = $this->fetchPokemon($i);
            $this->pokemonData[] = [
                'name' => $pokemonData['name'],
                'image' => $pokemonData['sprites']['front_default'],
                'id' => $i
            ];
        }

        return $this->pokemonData;
    }

    public function index()
    {
        $this->setPokeDataInArray();

        $data = [
            'title' => 'Original 150 PokeDex',
            'pokemonData' => $this->pokemonData
        ];

        $this->view('home/index', $data);
    }

    public function about()
    {
        $_SERVER['REQUEST_URI'];

        $data = [
            'title' => 'Pokemon Name',
            'url' => $_SERVER['REQUEST_URI'],
        ];

        $this->view('home/about', $data);
    }
}
