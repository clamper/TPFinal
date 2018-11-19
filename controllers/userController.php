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
    
            $userdao->addUser($userName, $userEmail, $userPassword);
        }
    }

?>