<?php 
require __DIR__ . "/views/header.php"
?>

<body class="bg-dark">
<div id="app">

<h1 class="text-center text-white">Logowanie</h1>
<div class="d-flex flex-column justify-content-center align-items-center">
<b-form @submit="onSubmit" @reset="onReset" >
        <b-form @submit="onSubmit" @reset="onReset">

            <b-form-group
                class="text-white"
                id="input-group-1"
                label="Adres email:"
                label-for="input-1"
            >  
                <b-form-input v-model="form.text" placeholder="Podaj email"></b-form-input>
            </b-form-group>

            <b-form-group
                class="text-white"
                style="width: 100%;"
                id="input-group-1"
                label="Twoje hasło:"
                label-for="input-1"
            >  
                <b-form-input v-model="form.password" type="password" placeholder="Podaj hasło"></b-form-input>
            </b-form-group>
    
            <b-button type="submit" variant="primary">Zaloguj się</b-button>
            <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
</div>
</div>
<script>        
  window.app = new Vue({
    el: "#app",
    data:function(){
        return {
        form: {
        },
        show: true
      }
    },
 
  })
</script>
</body>
</html>