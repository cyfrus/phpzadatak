<div class="col-md-8 col-lg-9 content_container">
<h3>Korisnici</h3>
  <div class="korisnici_inner">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th></th>
          <th scope="col">Username</th>
          <th scope="col">Ime</th>
          <th scope="col">Prezime</th>
          <th scope="col">E-mail</th>
          <th scope="col">Rola</th>
          <th scope="col">Operacije</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $this->load->helper('form');  
        foreach($korisnici as $korisnik) {
          echo "<tr>";
          echo "<td><i class='fa fa-user'></i></td>";
          echo "<td><a href=".site_url('/korisnik/').$korisnik->id.">".$korisnik->username."</a></td>";
          echo "<td>".$korisnik->ime."</td>";
          echo "<td>".$korisnik->prezime."</td>";
          echo "<td>".$korisnik->email."</td>";
          echo "<td>".$korisnik->rola."</td>";
          if($korisnik->rola !== "admin" && $user->rola === "admin") {
          echo "<td><a href=".site_url('/korisnik/'.$korisnik->id)."/edit"."  class='btn edit_button'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
          echo form_open('korisnik/'.$korisnik->id."/delete", array('class' => 'remove_btn_class')).
          form_submit('submit', "X", array('class' => 'remove_btn'))."</td>";
          echo "</tr>";
          } else {
            echo "<td><div></div></td>";
            echo "</tr>";
          }
        
        } 
        ?>
      </tbody>
    </table>
  </div>
</div>