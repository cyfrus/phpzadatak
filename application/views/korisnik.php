<div class="col-9 content_container">
    <h3><?php echo $korisnik->username; ?></h3>
    <div class="korisnik">
        <div>
            <span class="font-weight-bold">Ime: </span><?php echo $korisnik->ime; ?>
        </div>
        <div>
            <span class="font-weight-bold">Prezime: </span><?php echo $korisnik->prezime; ?>
        </div>
        <div>
            <span class="font-weight-bold">Email: </span> <?php echo $korisnik->email; ?>
        </div>
        <div>
            <span class="font-weight-bold">Rola:</span> <?php echo $korisnik->rola; ?>
        </div>
    <?php 
    if($korisnik->rola !== "admin" && $user->rola === "admin") { ?>
    <a href=<?php echo site_url('korisnik/').$korisnik->id."/edit"?> class="edit_btn">Uredi korisnika</a> 
    <?php 
        $this->load->helper('form');
        echo form_open('/korisnik/'.$korisnik->id.'/delete', array('class' => 'delete_artikal_form'));
        echo form_submit('submit', 'Izbrisi korisnika ', array('class' => 'delete_btn'));
        echo form_close();
     } ?>
    </div>

</div>