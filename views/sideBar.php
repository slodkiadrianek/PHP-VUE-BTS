<?php 
$type = 'user';
if(!empty(($_SESSION['employee']))){
    $type = 'employee';
}
?>

 <aside style="width: 20%; height:100%; " class="border border-dark border-top-0">
    <ul class="list-group">
        <li class="list-group-item border-dark border-top-0 rounded-0  border-right-0  <?php if($whichActive === 'userPanel') echo 'active';?> " v-on:click="redirect('/PHP-VUE-BTS/<?php echo $type ; ?>/dashboard.php')" role="button">Panel użytkownika</li>
        <li class="list-group-item border-dark rounded-0 border-right-0 <?php if($whichActive === 'cars') echo 'active';?>" role="button"  v-on:click="redirect('/PHP-VUE-BTS/<?php echo $type ; ?>/dashboard/cars.php')" >Przeglądaj dostępne samochody</li>
        <li class="list-group-item <?php if(!empty($_SESSION['employee'])) echo 'hidden'; ?> border-dark rounded-0 border-right-0 <?php if($whichActive === 'yourRentals') echo 'active';?>" role="button" v-on:click="redirect('/PHP-VUE-BTS/<?php echo $type ; ?>/dashboard/yourRentals.php')">Twoje wypożyczenia</li>
        <li class="list-group-item border-dark rounded-0 border-right-0 <?php if($whichActive === 'support') echo 'active';?>" role="button" v-on:click="redirect('/PHP-VUE-BTS/<?php echo $type ; ?>/dashboard/support.php')">Pomoc techniczna</li>
    </ul>
</aside> 