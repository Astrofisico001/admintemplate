<ul class="collapsible" data-collapsible="accordion">
    <li>
        <div class="collapsible-header"><span class="badge">2</span><i class="material-icons">turned_in_not</i>Consumo</div>
        <div class="collapsible-body col m12 s12">
            <div class="col m12 s12">
                <div id="container" class="col m6"></div>
                <div class="col m6">
                    <table id="tableConsumo">
                        <thead>
                            <tr>
                                <th>Mesa</th>
                                <th>Consumo</th>
                                <th>Valor</th>
                                <th>Terminar consumo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getConsumosServices as $value) { ?>
                                <tr>
                                    <td><?= $value["codigo_mesa"]; ?></td>
                                    <td><?= $value["litros"]." ltrs."; ?></td>
                                    <td><?= ConsumoService::calcularPrecioConsumo($value["litros"]); ?></td>
                                    <td><a class="btn-flat small" href="../../controllers/mesas/terminarConsumo.php?codigo_mesa=<?= $value["codigo_mesa"]; ?>" aria-label="Delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </li>
    <li>
        <div class="collapsible-header "><span class="new badge"><?= count($reservas) ?></span><i class="material-icons">view_column</i>Reservas</div>
        <div class="collapsible-body">
            <div class="card">
              <div class="card-content">
                <table id="table-reservas">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Mesa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $row) { ?>
                            <tr>
                                <td><?= "hace " . $row["desde_hace"] . " minutos"; ?></td>
                                <td><?= $row["producto"]; ?></td>
                                <td><?= $row["estado"]; ?></td>
                                <td><?= $row["codigo_mesa"]; ?></td>
                                <td> <a class="btn-flat waves-effect " href="#<?= $row["pedido_id"]; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <!-- Modal Structure -->
                                    <div id="<?= $row["pedido_id"]; ?>" class="modal">
                                        <div class="modal-content">
                                            <h4><?= $row["producto"]; ?></h4>
                                            <p>modal 1</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                                        </div>
                                    </div>
                                    <a class="btn-flat small" href="../../controllers/reservas/delete.php?cajero=1&&reserva_id=<?= $row["pedido_id"] ?>" aria-label="Delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </li>
    <li>
        <div class="collapsible-header"><span class="new badge">0</span><i class="material-icons">info</i>Problemas</div>
        <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
</ul>
