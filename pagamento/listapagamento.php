
<html>
<head>
<link rel="stylesheet" href="quarta.css" type="text/css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});
    </script>
</head>
<body  style="background-color:#b8b7b4;">
<div class="d-flex flex-row">
    <div class="dashboard">
        <div class="dashboard-nav">
            <header>
                <a href="" class="brand-logo">
                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> <span>Marta Freitas</span></a>
            </header>
            <nav class="dashboard-nav-list">
                <div class="nav-item-divider"></div>

                    <a href="index.html" class="dashboard-nav-item active">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>

                    <a href="#" class="dashboard-nav-item">
                        <i class="fas fa-file-upload"></i> Upload
                    </a>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i> Turmas
                    </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="turmas/quarta.php" class="dashboard-nav-dropdown-item">Quarta</a>
                        <a href="turmas/quinta.html" class="dashboard-nav-dropdown-item">Quinta</a>
                        <a href="turmas/sexta.html" class="dashboard-nav-dropdown-item">Sexta</a>
                        <a href="turmas/sabado.html" class="dashboard-nav-dropdown-item">Sabado</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-users"></i> Alunos
                    </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                        <a href="#" class="dashboard-nav-dropdown-item">New</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-money-check-alt"></i> Payments
                    </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="pagamento/listapagamento.php" class="dashboard-nav-dropdown-item">All</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Recent</a>
                        <a href="#" class="dashboard-nav-dropdown-item"> Projections</a>
                    </div>
                </div>
            </nav>
        </div><!--fim div nav-->
        
            <div class="dashboard-nav2"><form action="updateusu.php" method="get">
        
        <div id="inputs">
                <input type="text" name="nomepet" placeholder="Digite do mascote" >
        </div>
        
        <div id="inputs">
                <input type="text" name="idadepet" placeholder="Digite idade do mascote" >
        </div>
            
        <div id="inputs">
                <input type="text" name="pesopet" placeholder="Digite o peso do mascote" >
        </div>
        
        <div id="inputs">
                <input type="text" name="racapet" placeholder="Digite a ra�a do mascote" >             
        </div>
        <div id="inputs">
             <textarea  name="obs" placeholder ="Digite uma Observa��o"></textarea>
        </div>
     

        <div id="botao">
        <button class="btn_logar" type="submit">Cadastrar</button>
      <input type="button"class="btn_logar" value="Voltar" onclick="voltar()"> 
        </div>


        </form>
            </div>
           
        
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>