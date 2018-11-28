<div class="container">
<br>
    <div class="card">
        <div class="card-body text-center">
            entradas restantes por cada presentacion
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <br>

            <div class="card-text text-center">

                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Show</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Vendidas</th>
                            <th>Disponibles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($arrayReporterSold as $report) { 
                                ?>           
                                <tr>
                                    <td><?= $report['show']?></td>
                                    <td><?=date("d-m-Y", strtotime($report['date']))?></td>
                                    <td><?= $report['total']?></td>
                                    <td><?= $report['vendidos']?></td>
                                    <td><?=($report['total'] - $report['vendidos'] )?></td>
                                </tr>

                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</div>