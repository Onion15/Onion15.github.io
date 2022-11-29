<!DOCTYPE>
<html lang="pl">
    <head>
        <title>OniNet</title>
        <link rel="stylesheet" href="mainstyle.css">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        
        ?>
        <div id="website">
            <div id="header">
                <a href="index.html"><h1>OniNet</h1></a>
                <div id="menu">
                    <a href="https://google.pl" target="_blank" class="menuitem">O mnie</a>
                    <a href="https://onet.pl" target="_blank" class="menuitem">Kalendarz</a>
                    <a href="https://bing.pl" target="_blank" class="menuitem">Archiwum</a>
                    <a href="https://youtube.pl" target="_blank" class="menuitem">Lista kategorii</a>
                    <a href="https://wikipedia.org" target="_blank" class="menuitem">Linki do innych stron</a>
                    <a href="https://interia.pl" target="_blank" class="menuitem" href="https://interia.pl">Panel administracyjny</a>
                </div>               
            </div>
            <div id="container">
                <div id="articleholder">
                    <p id="articleTitle">Gra w oczko</p>
                    <div id="division"></div>
                    <?php include("gameScript.php"); ?> 
                    <div id="gameBox">
                        <div id="krupier">
                            <div class="cardHolder">
                                <?php
                                    foreach($_SESSION["krupierCards"] as $cards){
                                        echo "<div class='card'>". $cards. "</div>";
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            echo "<div class='Score'>Krupier: ". $_SESSION["krupier"]. "</div>";
                            echo "<div class='Score'>Gracz: ". $_SESSION["gracz"]. "</div>";
                        ?>
                        <div id="gracz">
                            <div class="cardHolder">
                                <?php
                                    foreach($_SESSION["graczCards"] as $cards){
                                        echo "<div class='card'>". $cards. "</div>";
                                    }
                                                                                 
                                ?>
                            </div>
                        </div>
                        <br>
                        <div id="buttons">  
                            <form name="oczko" method = "POST">                          
                                <input type="submit" name="Spasuj" value="Spasuj" <?php echo $_SESSION["spasujDisabled"]?>>
                                <input type="submit" name="Dobierz" value="Dobierz" <?php echo $_SESSION["dobierzDisabled"]?>>
                                <br>
                                <input type="submit" name="Nowa_Gra" value="Nowa gra" <?php echo $_SESSION["nowaGraDisabled"]?>>
                            </form>
                        </div>                       
                    </div>
                </div>                
                <div id="quickarticle">
                    <a class="quickarticleitem" href="game.php">Gra w oczko</a>
                    <a class="quickarticleitem" href="https:\\google.com" target="_blank">link nr 2</a>
                    <a class="quickarticleitem" href="https:\\google.com" target="_blank">link nr 3</a>
                    <a class="quickarticleitem" href="https:\\google.com" target="_blank">link nr 4</a>
                </div>
            </div>
            <div id="trueFooter"></div>
            <div id="footer">
                <h3>Wykonał Wojciech Cebula</h3>
            </div>
        </div>        
    </body>
</html>