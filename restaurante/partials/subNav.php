 <form action="index.php" method="POST">
    <div class="nav subNav">
        <ul>
            <li>
                <button class="btn btn-link" type="submit" name="ticketSubNav">Ticket <?php echo $_SESSION['ticketActual']; ?></button>
            </li>
            <li>
                 <button class="btn btn-link" type="submit" name="categoriaSubNav">Categorías</button>
            </li>
            <?php 
            if(isset($_SESSION['categoriaSeleccionada'])){
                
                echo '<li>
                        <button class="btn btn-link" type="submit" name="platosSubNav">Platos</button>
                      </li>';
            }
            ?>
        </ul>
    </div>
</form>