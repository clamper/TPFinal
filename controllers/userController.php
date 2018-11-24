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
                $newUser = new User();
                $newUser->setName();
                $newUser->setEmail();
                $newUser->setPassword();

                $userdao->addUser($newUser);
                $this->viewLoginForm();
            }
            else      //  ya existe un usuario con ese mail 
            {
                echo "ya existe un usuario registrado con ese mail!";
                $this->viewRegistrationForm();
            }
        }

        public function viewLoginForm($errormsg = "") 
        {
            require_once(VIEWS_PATH."userlogin.php");
        }

        public function Login()
        {
            $islogin= false;

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

                    $islogin = true;

                }
                else
                {
                    $errormsg = "usuario o clave incorrecto!";
                }
            }
            else
            {
                $errormsg = "usuario o clave incorrecto";
            }


            require_once(VIEWS_PATH."header.php");

            if ($islogin)
            {
                $home = new HomeController();
                $home->Index();
            }
            else
                $this->viewLoginForm($errormsg);

        }

        public function Logout()
        {
            session_destroy();

            session_start();

            require_once(VIEWS_PATH."header.php");

            $home = new HomeController();
            $home->Index();         // bye bye    
        }
    }

?>