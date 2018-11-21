<?php

    namespace Controllers;

    use Models\user as User;
    use dao\userDAO as UserDAO;

    class UserController
    {

        public function viewRegistrationForm()
        {
            require_once(VIEWS_PATH."userregister.php");
        }

        public function Register()
        {
            $userdao = new UserDAO();

            $userName = $_POST['name'];
            $userEmail = $_POST['mail'];
            $userPassword = $_POST['pass'];

            $user = $userdao->GetUserByEmail($userEmail);

            if ($user == null)
            {
                $userdao->addUser($userName, $userEmail, $userPassword);
                $this->viewLoginForm();
            }
            else      //  ya existe un usuario con ese mail 
            {
                echo "ya existe un usuario registrado con ese mail!";
                $this->viewRegistrationForm();
            }
        }

        public function viewLoginForm()
        {
            require_once(VIEWS_PATH."userlogin.php");
        }

        public function Login()
        {
            $userdao = new UserDAO();

            $userEmail = $_POST['mail'];
            $userPassword = $_POST['pass'];

            $user = null;
            $user = $userdao->GetUserByEmail($userEmail);

            if ($user != null)
            {
                if ($userPassword == $user->getPassword())
                {
                    $_SESSION["userType"] = $user->getUserType();
                    $_SESSION["userName"] = $user->getName();
                    $_SESSION["userId"] = $user->getIdUser();

                    $home = new HomeController();
                    $home->Index();         // bye bye    
                }
                else
                {
                    echo "Password incorrecto!!!!";
                    $this->viewLoginForm();
                }
            }
            else
            {
                echo "user es null";
                $this->viewLoginForm();
            }
        }

        public function Logout()
        {
            session_destroy();
            
            $home = new HomeController();
            $home->Index();         // bye bye    
        }
    }

?>