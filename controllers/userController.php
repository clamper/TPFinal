<?php

    namespace Controllers;

    use Models\user as User;

    use dao\userDAO as UserDAO;
    use dao\LocationDAO as LocationDAO;
    use dao\SeatDAO as SeatDAO;
    use dao\PresentationDAO as PresentationDAO;
    use dao\ShowDAO as ShowDAO;

    use Controllers\mailController as MailController;

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
                $newUser->setName($userName);
                $newUser->setEmail($userEmail);
                $newUser->setPassword($userPassword);

                $userdao->addUser($newUser);
                $this->viewLoginForm();
            }
            else      //  ya existe un usuario con ese mail 
            {
                echo "ya existe un usuario registrado con ese mail!";
                $this->viewRegistrationForm();
            }
        }

        public function viewRecoveryForm($mail = "", $error = "") 
        {
            require_once(VIEWS_PATH."userrecovery.php");
        }

        public function RecoveryPass($mail)
        {
            $error = "";

            $userdao = new UserDAO();

            $user = $userdao->GetUserByEmail($mail);

            if ($user != null)
            {
                $mailSystem = new MailController();

                $hash = $this->encodeUser($user);


                $mailMsg = "<div>".
                    "<h4>mi envento</h4>".
                    "<br><br><br>".
                    "Para reseat su clave haga click en el siguiente link<br>".
                    "<a href='http://127.0.0.1/utn/TPFINALLAB4/user/resetPass?mail=".$mail."&cod=".$hash."'>resetear contraseña</a>".
                    "</div>";

                $error = $mailSystem->send($mail, "mi-evento recuperacion de clave", $mailMsg);
            }
            else    
                $error = "no tenemos ningun usuario registrado con ese mail";

            
            if ($error == "")
            {
                $this->viewRecoveryForm($mail, "el reseteo de clave fue un enviado a su mail");
            }
            else    
                $this->viewRecoveryForm($mail, $error);
        }

        public function resetPass($mail, $cod, $pass = "")
        {
            $security = false;

            $userdao = new UserDAO();

            $user = $userdao->GetUserByEmail($mail);

            if ($user != null)
            {
                $hash = $this->encodeUser($user);
                if ($hash == $cod)
                    $security = true;
            }    
            
            

            if ($security)
                if ($pass == "")
                    require_once(VIEWS_PATH."userresetpass.php");
                else
                {
                    $userdao->resetPass($mail, $pass);
                    $this->viewLoginForm("","contraseña reiniciada");
                }
            else
            {
                $events = new EventController();
                $events->showAllEvents();
            }
        }

        public function encodeUser($usuario)
        {
            $hash = md5($usuario->getName() . $usuario->getEmail() . $usuario->getPassword() . $usuario->getUserType());

            $hash = substr($hash, 0, 15);

            return $hash;
        }
        

        public function viewLoginForm($errormsg = "", $msg = "") 
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
                    $_SESSION['cart'] = Array();

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

    
        public function addToCart()
        {
            $locationsDAO = new LocationDAO();

            $idpresentation = $_POST['idpresentation'];

            $locations = $locationsDAO ->GetAllLocationsByPresentation($idpresentation);

            foreach ($_POST as $key => $value) {
                if ( substr($key,0,4) == "seat")
                {
                    $idseat = str_replace("seat","",$key);

                    if (    ($value != "") && ($value != 0) )
                    {
                        foreach ($locations as $location){
                        if ( $location->getIdSeat() == $idseat )
                            if (    isset($_SESSION['cart'][$location->getIdLocation()])   )
                                $_SESSION['cart'][$location->getIdLocation()] = $_SESSION['cart'][$location->getIdLocation()] + $value;
                            else
                                $_SESSION['cart'][$location->getIdLocation()] = $value;
                        }
                    }
                }       
            }

            //echo "post: "; var_dump($_POST);
            //echo "<br><br>cart: ";var_dump($_SESSION['cart']);

            require_once(VIEWS_PATH."header.php");

            $event = new EventController();
            $event->showDetail($_POST['idshow']);
        }

        public function myCart()
        {
            //var_dump($_SESSION['cart']);

            $locationsDAO = new LocationDAO();
            $seatDAO = new SeatDAO();
            $presentationDAO =  new PresentationDAO();
            $showDAO = new ShowDAO();

            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."mycart.php");

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