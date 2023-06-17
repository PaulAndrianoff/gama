<?php

namespace Gama\GamaPhp\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Core\Language\Language;

class HomeController
{
    protected $language;

    public function __construct()
    {
        global $appConfig;

        $this->language = new Language($appConfig['lang']);
    }

    public function index()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $twig = new Environment($loader);

        $welcomeMessage = $this->language->get('welcome');

        echo $twig->render('welcome.twig', ['message' => $welcomeMessage]);
    }
}
