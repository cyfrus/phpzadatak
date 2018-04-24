<div class="col-md-6 content_container">
    <h3>Dodaj korisnika</h3>
    <div class="add_user_div">
    <?php 
        $this->load->helper('form');
        echo form_open('korisnik/new');
        echo form_label('Username', 'username');
        echo form_input('username', '', array('class' => 'form-control', ''));
        echo form_label('Ime', 'ime');
        echo form_input('ime', '', array('class' => 'form-control'));
        echo form_label('Prezime', 'prezime');
        echo form_input('prezime', '', array('class' => 'form-control'));
        echo form_label('Email', 'email');
        echo form_input(array('type' => 'email', 'class' => 'form-control', 'name'=> 'email'));
        echo form_label('Lozinka', 'password');
        echo form_password('password', '', array('class' => 'form-control'));
        echo form_submit('submit', "Dodaj korisnika", array('class' => 'btn btn-dark form-control submit_btn'));
        echo form_close();
    ?>
    </div>
</div>