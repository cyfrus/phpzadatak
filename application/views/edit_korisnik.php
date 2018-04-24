<div class="col-md-8 content_container">
    <h3>Uredi korisnika</h3>
    <div class="edit_user_container">
        <?php
            $this->load->helper('form');
            echo form_open('korisnik/'.$korisnik->id.'/update');
            echo form_label('Username', 'username');
            echo form_input('username', $korisnik->username, array('class' => 'form-control', ''));
            echo form_label('Ime', 'ime');
            echo form_input('ime', $korisnik->ime, array('class' => 'form-control'));
            echo form_label('Prezime', 'prezime');
            echo form_input('prezime', $korisnik->prezime, array('class' => 'form-control'));
            echo form_label('Email', 'email');
            echo form_input(array('class' => 'form-control', 'type' => 'email', 'value' => $korisnik->email, 'name' => 'email'));
            echo form_label('Password', 'password');
            echo form_input(array('class' => 'form-control', 'type' => 'password', 'name' => 'password'));
            echo form_submit('submit', "Potvrdi izmjene", array('class' => 'btn btn-dark form-control submit_btn'));
            echo form_close();
        ?>
    </div>
</div>