<?php 
require_once __DIR__ . "/../Model/Repository/UsuarioRepository.php";


class LoginController extends Controller
{

    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UsuarioRepository();
    }

    public function Autenticar()
    {
        try {
            $username = $_REQUEST['username'] ?? null;
            $password = $_REQUEST['password'] ?? null;
            
            if (!$username || !$password) {
                throw new Exception("Username and password are required.");
            }

            // Assuming User class and some method to validate credentials exist
            $user = $this->userRepository->getUserByCredentials($username, $password);
            // Validate credentials (method not implemented here, assuming it exists)
            $isValid = $this->validateCredentials($user);

            if ($isValid) {
                $_SESSION['User'] = $user;
                $this->redirect("/Ticket/Index");
            } else {
               $this->redirect("/");
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    private function validateCredentials($user)
    {
        if($user){
            return true;
        }

        return false;
    }


    public function Logout()
    {
        session_start();
        session_destroy();
        $this->redirect("/");
    }
}

