<?php

    namespace Controllers;

    use Models\ticket as Ticket;
    use Models\presentation as Presentation;
    use Models\location as Location;
    use Models\seat as Seat;
    use Models\show as Show;

    use dao\ticketdao as TicketDAO;
    use dao\presentationDAO as PresentationDAO;
    use dao\locationDAO as LocationDAO;
    use dao\seatDAO as SeatDAO;
    use dao\showDAO as ShowDAO;


    class TicketController
    {

        public function ViewMyTickets($msg = ""){

            $TicketDao = new TicketDAO();
            $locationDAO = new LocationDAO();
            $SeatDAO = new SeatDAO();
            $PresentationDAO = new PresentationDAO();
            $ShowDAO = new ShowDAO();

            $array_ticket = array();
            $array_ticket = $TicketDao->GetAllTicketsByUser($_SESSION["userId"]);

            require_once(VIEWS_PATH."viewmyticket.php");
        }
    
        public function ConfirmTransaction(){
    
            $msg = "";

            if (isset($_SESSION['cart'])){

                $TicketDao = new TicketDAO();
                $locationDAO = new LocationDAO();
                $SeatDAO = new SeatDAO();
                $PresentationDAO = new PresentationDAO();

                foreach ($_SESSION['cart'] as $idLocation => $cantidad) {
    
                    if ($cantidad > 0){
        
                        for ($i=0; $i < $cantidad; $i++) { 
    
                            $ticket = new Ticket();

                            $location = $locationDAO->GetLocationById($idLocation);
                            $presentation = $PresentationDAO->GetPresentationById($location->getIdPres());
                            $seat = $SeatDAO->GetSeatbyID($location->getIdSeat());
                            
                            $date = date("d-m-y", strtotime($presentation->getPresDate()));
                            $precio = $location->getLocationPrice();

                            $qr = $this->GenerarQR();
            
                            $ticket->setIdUser($_SESSION["userId"]);
                            $ticket->setIdLocation($idLocation);
                            $ticket->setQrCode($qr);
                            $ticket->setPrice($precio);
                            $ticket->setDate($date);
                                                        

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
            else{
                $msg = "Ha ocurrido un error con su carrito!";
                $this->ViewMyTickets($msg);
            }
            
    
        }
    
        public function GenerarQR(){  // HELP !
            return 0;
        }

    }   



?>