<div class="container">
    <div class="col-md-8 offset-md-2 login_div">
        
    <h1 class="text-center">Prijava</h1>
        <?php 
            $this->load->helper('form');
            echo form_open('login');
            echo form_label('Username', 'username');
            echo form_input('username', '', array('class' => 'form-control'));
            echo form_label('Password', 'password');
            echo form_password('password', '', array('class' => 'form-control'));
            echo form_submit('submit', 'Prijavi se', array('class' => 'btn btn-dark form-control submit_btn'));
            echo form_close();
            echo "<div class='error_container'>";
            echo validation_errors();
            if(isset($error)){
                echo $error;
            }
            echo "</div>";
        ?>
    </div>
</div>
