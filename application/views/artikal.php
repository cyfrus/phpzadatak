<div class="col-8 content_container">
    <div class="artikal_container">
        <h3><?php echo $artikal->naziv; ?></h3>
        <div class="artikal_details"> 
            <div>   
                Cijena:<span class="font-weight-bold cijena"> <?php echo $artikal->cijena; ?> Kn</span>
            </div>
            <div>
                <span class="float-right date_added">Dodano: <?php echo $artikal->dodano; ?></span>
            </div>
        </div>
        <div class="dodao_container">
            Dodao korisnik: <?php echo $artikal->username; ?>
        </div>
        <a href=<?php echo site_url('/artikal/').$artikal->id."/edit"; ?> class="edit_btn">Uredi artikal</a>
        <?php 
        $this->load->helper('form');
        echo form_open('/artikal/'.$artikal->id.'/delete', array('class' => 'delete_artikal_form'));
        echo form_submit('submit', 'Izbrisi artikal ', array('class' => 'delete_btn'));
        echo form_close();
        ?>
    </div>
    
    
</div>