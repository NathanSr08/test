<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <!-- <div class="row"> -->
            <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
            <!-- <div class="col-lg-7"> -->
                <div class="p-5">
                <div class="alert alert-secondary" role="alert" style="text-align:center;">
Information Client
</div>
                    <form class="user" method="post">
                  
                        <div class="form-group row">
                        <div class="row">
    <div class="col-sm">
    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                  name="nom" value="<?php echo $f[0]['Nom']; ?>">
                                    <br>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="adresse"
                                    placeholder="Adresse" value="<?php if(isset($f[0]['ad']))  { echo $f[0]['ad']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Situation Familial:</label>
                                    <input type="text" name="situation_f" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['sit']))  { echo $f[0]['sit']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Age Mr</label>
                                    <input type="text" name="age_mr" class="form-control form-control-user" id="exampleFirstName"  value="<?php if(isset($f[0]['age_mr']))  { echo $f[0]['age_mr']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Proffesion Mme</label>
                                    <input type="text" name="pro_mme" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['pro_mr']))  { echo $f[0]['pro_mme']; }?>">
                                  
                                   
    </div>
    <div class="col-sm">
    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="email"
                                    placeholder="Email" value="<?php if(isset($f[0]['email']))  { echo $f[0]['email']; } ?>" >
                                    <br>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="ville"
                                    placeholder="Ville" value="<?php if(isset($f[0]['ville']))  { echo $f[0]['ville']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Enfants à charge :</label>
                                    <input type="text" class="form-control form-control-user" name="enfants" id="exampleFirstName" value="<?php if(isset($f[0]['enfants']))  { echo $f[0]['enfants']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Age Mme</label>
                                    <input type="text" name="age_mme" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['age_mr']))  { echo $f[0]['age_mme']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Ref avis</label>
                                    <input type="text" class="form-control form-control-user" name="ref" id="exampleFirstName" value="<?php if(isset($f[0]['ref']))  { echo $f[0]['ref']; }?>">
                                   
    </div>
    <div class="col-sm">
    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                   name="phone" value="<?php echo $f[0]['Num']; ?>">
                                    <br>
                                    <input type="text" class="form-control form-control-user" name="cp" id="exampleFirstName"
                                   value="<?php echo $f[0]['cp']; ?>">
                                   <br>
                                    <label for="">&nbsp;&nbsp; Numéro Fiscal:</label>
                                    <input type="text" name="num_f" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['num_f']))  { echo $f[0]['num_f']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Proffesion Mr:</label>
                                    <input type="text" name="pro_mr" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['pro_mr']))  { echo $f[0]['pro_mr']; }?>">
                                    <br>
                                   
    </div>
  </div>

                </div>
                <div class="alert alert-secondary" role="alert" style="text-align:center;">
                Informations Maison
</div>
<div class="row">
    <div class="col-sm">
    <br>
                                    <label for="">&nbsp;&nbsp; Propriétaire depuis:</label>
                                    <input type="date" name="date_p" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['date_p']))  { echo $f[0]['date_p']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Consomation:</label>
                                    <input type="text" name="conso" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $f[0]['Conso']; ?>"> <br>
                                    <label for="">&nbsp;&nbsp; Age chaudiere:</label>
                                    <input type="text" name="age_c" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['age_c']))  { echo $f[0]['age_c']; }?>">
    </div>
    <div class="col-sm">
    <br>
                                    <label for="">&nbsp;&nbsp; Superficie:</label>
                                    <input type="text" name="sup" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['sup']))  { echo $f[0]['sup']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Mode de chauffage:</label>
                                    <input type="text" name="mode_c" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $f[0]['mode_c']; ?>"> <br>
                                    <label for="">&nbsp;&nbsp; Planchet Chauffant:</label>
                                    <input type="text" name="planchet_c" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['planchet_c']))  { echo $f[0]['planchet_c']; }?>">
    </div>
    <div class="col-sm">
    <br>
                                    <label for="">&nbsp;&nbsp; Age de la maison:</label>
                                    <input type="text" name="age_m" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['age_m']))  { echo $f[0]['age_m']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Matériaux Radiateur:</label>
                                    <input type="text" name="mat_r" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['mat_r']))  { echo $f[0]['mat_r']; }?>">
    </div>
  </div>
  <br>
  <div class="alert alert-secondary" role="alert" style="text-align:center;">
Etats Dossier
</div>
<fieldset class="form-group">
      <legend class="mt-4">Dossier :</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="stat" id="optionsRadios1" value="1" <?php if(isset($f[0]['stat'])){ if($f[0]['stat']==1){ ?> checked="" <?php } }  ?>>
        Validé 
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="stat" id="optionsRadios2" value="2"  <?php if(isset($f[0]['stat'])){ if($f[0]['stat']==2){  echo 'checked=""';  } } ?>>
        Refusé
        </label>
      </div>
      <div class="form-check disabled">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="stat" id="optionsRadios3" value="3" <?php if(isset($f[0]['stat'])){ if($f[0]['stat']==3){  echo 'checked=""';  } } else { echo 'checked=""'; }?>>
      En Attente
        </label>
      </div>
    </fieldset>
   
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Commentaire</label>
      <textarea class="form-control" name="com" id="exampleTextarea" rows="3" ><?php if(isset($f[0]['com']))  { echo $f[0]['com']; }?></textarea>
    </div>
 
    <br>
    <button type="submite" class="btn btn-success">Success</button>
            </div>
            
           
        </div>
       
    </div>
   
</div>

</div>
