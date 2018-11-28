<div class="container">
<br>
    <div class="card">
        <div class="card-body text-center">
            ventas por dia
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <br>

            <div class="card-text text-center">

                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha de venta</th>
                            <th>Cantidad vendidas</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($arrayReporterForDay as $report) { 
                                ?>           
                                <tr>
                                    <td><?=date("d-m-Y", strtotime($report['date']))?></td>
                                    <td><?= $report['cant']?></td>
                                    <td>$<?= $report['total']?></td>
                                </tr>

                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>

    <div class="card">
        <div class="card-body text-center">
            ganancias por categorias
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <br>

            <div class="card-text text-center">

                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Categoria</th>
                            <th>Cantidad vendidas</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($arrayReporterForCategories as $report) { 
                                ?>           
                                <tr>
                                    <td><?=$report['category']?></td>
                                    <td><?=$report['cant']?></td>
                                    <td>$<?=$report['total']?></td>
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