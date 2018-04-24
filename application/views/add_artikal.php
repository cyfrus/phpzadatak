<div class="col-md-6 content_container">
    <h3>Dodaj artikal</h3>
    <div class="add_artikal_div">
    <?php 
        $this->load->helper('form');
        echo form_open('artikal/new');
        echo form_label('Naziv', 'naziv');
        echo form_input('naziv', '', array('class' => 'form-control', ''));
        echo form_label('Cijena', 'cijena');
        echo form_input(array('type' => 'number', "step" => "0.01", 'name' => 'cijena', 'id' => 'cijena', 'class' => 'form-control'));
        echo form_submit('submit', "Dodaj artikal", array('class' => 'btn btn-dark form-control submit_btn'));
        echo form_close();
    ?>
    </div>
   
</div>