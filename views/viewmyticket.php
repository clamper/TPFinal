<div class="container" id="abm_container">
        <br>

        <?php
        if ($msg != "")
            echo "<div class='alert alert-info alert-dismissible fade show'>".
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>".$msg."</div>";
        ?>        

        <div class="card">
            <div class="card-body">
                <br>
                <div class="card-text text-center">

                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nro ticket</th>
                                <th>Show</th>
                                <th>Fecha</th>
                                <th>Ubicacion</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($array_ticket as $ticket) {            

                                $location = $locationDAO->GetLocationById($ticket->getIdLocation());
                                $presentation = $PresentationDAO->GetPresentationById($location->getIdPres());
                                $seat = $SeatDAO->GetSeatbyID($location->getIdSeat());
                                $show = $ShowDAO->GetShowByID($presentation->getIdShow());
                            ?>

                            <tr>
                                <td><?= $ticket->getTicketNumber(); ?></td>
                                <td><?= $show->getShowName(); ?></td>
                                <td><?= $ticket->getDate(); ?></td>
                                <td><?= $seat->getSeatName(); ?></td>
                                <td style="color:green;"><?= $ticket->getPrice(); ?></td>
                            </tr>

                            <?php
                                }
                            ?>
                        </tbody>
                    </table>




                </div>
            </div>
        </div>