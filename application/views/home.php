        <div class="col-9 content_container">
            <h3>Artikli</h3>
            <?php 
            
            foreach($artikli as $artikal) {
                echo "<div class='artikal'>";
                echo "<h6 class='artikal_naziv'>".$artikal->naziv."</h6>";
                echo "<div>".$artikal->cijena." <span class=''>Kn</span></div>";
                echo "<a class='float-right' href=".site_url('/artikal/'.$artikal->id).">Pregledaj</a>";
                echo "</div>";
            }
            ?>
        </div>


