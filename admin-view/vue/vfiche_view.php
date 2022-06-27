<!-- <div class="container">
    <h3 style="text-align:center;">Fiche Client</h3>
    <br><br>
    <div class="row" style="text-align:center">
    <div class="col-sm">
    <label for="">Nom :</label>
    <label for=""><?php echo $f[0]['Nom']; ?></label>
    <br>
    <label for="">Nom :</label>
    <label for=""><?php echo $f[0]['Nom']; ?></label>
    </div>
    <div class="col-sm">
    <label for="">Email :</label>
    <label for=""><a href="mailto:<?php if(isset($f[0]['email']))  { echo $f[0]['email']; } ?>" target="_blank"><?php if(isset($f[0]['email']))  { echo $f[0]['email']; } ?></a> </label>
    </div>
    <div class="col-sm">
    <label for="">Téléphone :</label>
    <label for=""><a href="tel:+<?php echo $f[0]['Num']; ?>"  target="_blank">+<?php echo $f[0]['Num']; ?></a> </label>
    </div>
  </div>
   
</div> -->
<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <!-- <div class="row"> -->
            <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
            <!-- <div class="col-lg-7"> -->
                <div class="p-5">
                <div class="alert alert-secondary" role="alert" style="text-align:center;">
                <?php echo $f[0]['Nom']; ?> <div ><?php if($_SESSION['fonction']=="Confirmateur"){ ?> Rendez-vous : <a href="../php/aganda.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg></a><?php } ?></div>
</div>
                    <form class="user" method="post">
                  
                        <div class="form-group row">
                       
                        <div class="row">
    <div class="col-sm">
    
                                    
                                    <label class="form-control " id="exampleFirstName" style="text-align:center;"><?php if(isset($f[0]['ad']))  { echo $f[0]['ad']; } ?> </label> 

                           
                                    <label for="">&nbsp;&nbsp; Situation Familial:</label>
                                    <label class="form-control " id="exampleFirstName" style="text-align:center;"><?php if(isset($f[0]['sit']))  { echo $f[0]['sit']; }?></label>
                                    
                                    <label for="">&nbsp;&nbsp; Age Mr</label>
                                    <label class="form-control " id="exampleFirstName" style="text-align:center;"><?php if(isset($f[0]['age_mr']))  { echo $f[0]['age_mr']; } ?> </label> 

                                    <br>
                                    <label for="">&nbsp;&nbsp; Proffesion Mme</label>
                                    <input type="text" disabled="" name="pro_mme" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['pro_mr']))  { echo $f[0]['pro_mme']; }?>">
                                  
                                   
    </div>
    <div class="col-sm">
    <label class="form-control " id="exampleFirstName" style="text-align:center;"><a href="mailto:<?php if(isset($f[0]['email']))  { echo $f[0]['email']; } ?>"><?php if(isset($f[0]['email']))  { echo $f[0]['email']; } ?></a> </label> 
                                    
                                    <label for="">Ville</label>
                                    <label class="form-control " id="exampleFirstName" style="text-align:center;">
                                  <?php if(isset($f[0]['ville']))  { echo $f[0]['ville']; }?></label>
                                    <br>
                                    <label for="">&nbsp;&nbsp; Enfants à charge :</label>
                                    <input type="text" disabled="" class="form-control form-control-user" name="enfants" id="exampleFirstName" value="<?php if(isset($f[0]['enfants']))  { echo $f[0]['enfants']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Age Mme</label>
                                    <input type="text" disabled="" name="age_mme" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['age_mr']))  { echo $f[0]['age_mme']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Ref avis</label>
                                    <input type="text" disabled="" class="form-control form-control-user" name="ref" id="exampleFirstName" value="<?php if(isset($f[0]['ref']))  { echo $f[0]['ref']; }?>">
                                   
    </div>
    <div class="col-sm">
    <label class="form-control " id="exampleFirstName" style="text-align:center;"> <a href="tel:+<?php echo $f[0]['Num']; ?>" target="_blank">+<?php echo $f[0]['Num']; ?></a>  </label>
                               
                                    
                                    <label for="">Code Postal</label>
                                    <label class="form-control " id="exampleFirstName" style="text-align:center;"><?php echo $f[0]['cp']; ?></label>
                                   <br>
                                    <label for="">&nbsp;&nbsp; Numéro Fiscal:</label>
                                    <input type="text" disabled="" name="num_f" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['num_f']))  { echo $f[0]['num_f']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Proffesion Mr:</label>
                                    <input type="text" disabled="" name="pro_mr" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['pro_mr']))  { echo $f[0]['pro_mr']; }?>">
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
                                    <input type="date" disabled="" name="date_p" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['date_p']))  { echo $f[0]['date_p']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Consomation:</label>
                                    <input type="text" disabled="" name="conso" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $f[0]['Conso']; ?>"> <br>
                                    <label for="">&nbsp;&nbsp; Age chaudiere:</label>
                                    <input type="text" disabled="" name="age_c" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['age_c']))  { echo $f[0]['age_c']; }?>">
    </div>
    <div class="col-sm">
    <br>
                                    <label for="">&nbsp;&nbsp; Superficie:</label>
                                    <input type="text" name="sup" disabled="" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['sup']))  { echo $f[0]['sup']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Mode de chauffage:</label>
                                    <input type="text" name="mode_c" disabled="" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $f[0]['mode_c']; ?>"> <br>
                                    <label for="">&nbsp;&nbsp; Planchet Chauffant:</label>
                                    <input type="text" name="planchet_c" disabled="" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['planchet_c']))  { echo $f[0]['planchet_c']; }?>">
    </div>
    <div class="col-sm">
    <br>
                                    <label for="">&nbsp;&nbsp; Age de la maison:</label>
                                    <input type="text" name="age_m" disabled="" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['age_m']))  { echo $f[0]['age_m']; }?>">
                                    <br>
                                    <label for="">&nbsp;&nbsp; Matériaux Radiateur:</label>
                                    <input type="text" name="mat_r" disabled="" class="form-control form-control-user" id="exampleFirstName" value="<?php if(isset($f[0]['mat_r']))  { echo $f[0]['mat_r']; }?>">
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
          <input type="radio" class="form-check-input" disabled="" name="stat" id="optionsRadios1" value="1" <?php if(isset($f[0]['stat'])){ if($f[0]['stat']==1){ ?> checked="" <?php } }  ?>>
        Validé 
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" disabled="" name="stat" id="optionsRadios2" value="2"  <?php if(isset($f[0]['stat'])){ if($f[0]['stat']==2){  echo 'checked=""';  } } ?>>
        Refusé
        </label>
      </div>
      <div class="form-check disabled">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" disabled="" name="stat" id="optionsRadios3" value="3" <?php if(isset($f[0]['stat'])){ if($f[0]['stat']==3){  echo 'checked=""';  } } else { echo 'checked=""'; }?>>
      En Attente
        </label>
      </div>
    </fieldset>
   
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Commentaire</label>
      <textarea class="form-control" name="com" disabled="" id="exampleTextarea" rows="3" ><?php if(isset($f[0]['com']))  { echo $f[0]['com']; }?></textarea>
    </div>
 
    <br>
    
            </div>
            
           
        </div>
       
    </div>
   
</div>

</div>
