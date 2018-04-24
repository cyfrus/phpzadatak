<div class="col-6 content_container">
        <h3>Uredi artikal</h3>
        <div class="edit_artikal_inner">
            <?php 
                $this->load->helper('form');
                echo form_open('/artikal/'.$artikal->id."/update");
                echo form_label('Naziv', 'naziv');
                echo form_input('naziv', $artikal->naziv, array('class' => 'form-control', ''));
                echo form_label('Cijena', 'cijena');
                echo form_input('cijena', $artikal->cijena, array('type' => 'number', "step" => "0.01", 'id' => 'cijena', 'class' => 'form-control'));
                echo form_submit('submit', 'Uredi artikal', array('class' => 'btn btn-dark form-control submit_btn'));
                echo form_close();
            ?>
        </div>
</div>