<h1>Logowanie</h1>
             <div class="form-group">
                 <label for="exampleInputEmail1" >Adres email</label>
                 <input type="email" name="email_<?php echo $sufix?>" class="<?php errorPass('class', 'email',)?>"  placeholder="<?php errorPass('text', 'email', 'Wpisz email')?>">
             </div>
             <div class="form-group">
                 <label for="exampleInputPassword1" >Hasło</label>
                 <input type="password" class="<?php errorPass('class', 'pass')?>" id="exampleInputPassword1" 
                 name="haslo_<?php echo $sufix?>" placeholder="<?php errorPass('text', 'pass', 'Wpisz hasło')?>">
             </div>
            <button type="submit" class="btn btn-primary">Zaloguj  się</button>