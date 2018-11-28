<?php

    namespace Controllers;

    use Models\ticket as ticket;
    use dao\ticketdao as TicketDAO;


    class TicketController
    {

        public function ViewMyTickets($msg = ""){

            require_once(VIEWS_PATH."viewmyticket.php");
        }
    
        public function ConfirmTransaction(){
    
            $msg = "";
    
            foreach ($_SESSION['cart'] as $idLocation => $cantidad) {
    
                if ($cantidad > 0){
    
                    for ($i=0; $i < $cantidad; $i++) { 

                        $ticket = new Ticket();
    
                        $qr = $this->GenerarQR();
        
                        $ticket->setIdUser($_SESSION["userId"]);
                        $ticket->setIdLocation($idLocation);
                        $ticket->setQrCode($qr);
        
                        $TicketDao = new TicketDAO();
                        $TicketDao->addTicket($ticket);
                    }
                    
                    $_SESSION['cart'] = array();
                    require_once(VIEWS_PATH."header.php");
                    $msg = "Su compra se ha confirmado con exito!";
                }
                else{
                    $msg = "Hubo un error al procesar su compra!";
                }
    
                
            }
    
            $this->ViewMyTickets($msg);
    
        }
    
        public function GenerarQR(){  // HELP !
            return 0;
        }

    }   



?>