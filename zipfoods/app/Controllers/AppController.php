<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $welcomes = ['Welcome', 'Aloha', 'Welkom', 'Bienvenidos', 'Bienvenu', 'Welkomma'];
        
        return $this->app->view('index', [
            'welcome' => $welcomes[array_rand($welcomes)]
        ]);
    }

    public function contact()
    {
        return $this->app->view('contact', [
            'email' => 'support@zipfoods.com'
        ]);
    }

    public function about()
    {
        return $this->app->view('about', [
            'message' => 'ZipFoods is your one-stop-shop for conenient online grocery shopping in thee greater Boston area.'
        ]);
    }

    public function practice()
    {
        # src/Controllers/AppController.php
    # Set up all the variables we need to make a connection
    $host = $this->app->env('DB_HOST');
    $database = $this->app->env('DB_NAME');
    $username = $this->app->env('DB_USERNAME');
    $password = $this->app->env('DB_PASSWORD');
    
    # DSN (Data Source Name) string
    # contains the information required to connect to the database
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

    # Driver-specific connection options
    $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        # Create a PDO instance representing a connection to a database
        $pdo = new \PDO($dsn, $username, $password, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    dump('Connection successful!');

    }
}