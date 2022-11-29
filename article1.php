<!DOCTYPE>
<html lang="pl">
    <head>
        <title>OniNet</title>
        <link rel="stylesheet" href="mainstyle.css">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>
    <body>
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
                    <p id="articleTitle">Lorem ipsum</p>
                    <div id="division"></div>
                    <div id="contentBox">
                        <?php

                            $content = array(
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut aliquet orci, vel vehicula leo. Vestibulum sed dapibus purus. In vel metus erat. Donec est tortor, cursus sed sagittis vel, dapibus sed turpis. Aenean tincidunt, libero non condimentum venenatis, mauris mi venenatis elit, eget auctor arcu felis ut urna. In ultrices erat a odio egestas facilisis. Nulla tincidunt, ex vel tincidunt sagittis, neque eros efficitur quam, ac feugiat leo nunc quis ante. Aenean sed pharetra ante, sit amet malesuada lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam suscipit cursus augue at tempus. Pellentesque lobortis velit sit amet ex sodales, non tempor erat efficitur. Nullam consectetur massa vel enim accumsan, quis sodales tortor dignissim. Phasellus non arcu leo.",
                                "Suspendisse porttitor semper lorem, a venenatis metus lobortis ut. Nam commodo mauris vel dui rhoncus rhoncus. Sed vehicula rutrum consectetur. Nam ullamcorper odio lobortis lorem mollis lacinia. Morbi aliquam in dolor vel varius. Morbi sollicitudin odio erat, faucibus pretium nibh feugiat id. Sed tempus accumsan blandit.",
                                "Duis gravida justo a tristique tincidunt. Donec lobortis, lacus eget tristique vehicula, lorem ligula fermentum justo, in condimentum neque dolor sit amet arcu. Curabitur dapibus nisi a leo volutpat, quis ultricies mauris ullamcorper. Curabitur vel pharetra neque. Aliquam a mauris quis massa scelerisque tempor. Proin in tempus nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed eget urna et dolor tincidunt varius. Phasellus quis finibus lacus, in vestibulum justo. Nam non turpis tincidunt, tristique justo in, ultricies est. Donec eleifend magna dignissim porta volutpat. Nam eu porttitor leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius metus quis erat elementum porta. Vestibulum vulputate sem a est imperdiet viverra. Fusce orci massa, tristique eget ex at, tempor efficitur massa.",
                                "Proin in sagittis est, convallis varius magna. Suspendisse dui odio, porttitor in enim id, fringilla laoreet velit. Morbi lobortis enim fringilla dui vestibulum, quis eleifend nisi suscipit. Integer ac posuere lorem, id mattis quam. Aliquam et volutpat nibh, sit amet molestie arcu. Curabitur commodo, erat sit amet hendrerit auctor, tellus tortor ornare tellus, ut eleifend nunc est sit amet felis. Aliquam iaculis bibendum lacus, eu sollicitudin lorem dapibus vel. Suspendisse potenti.",
                                "Aliquam at aliquam lorem. Cras lacinia dui ac dolor dictum tincidunt. Phasellus facilisis lorem id urna vulputate, faucibus pharetra eros placerat. Nullam at rhoncus lectus. Nam non dictum lorem. Donec lorem tortor, sagittis non tincidunt vel, consequat vitae quam. Phasellus eget neque in orci viverra vehicula. Fusce faucibus arcu eu nunc tempor, nec tincidunt mauris porttitor."
                            );

                            $page = 1;

                            if(!isset($_POST['page']) && is_numeric($page))
                            {
                                $page = 1;
                            }
                            else
                            {
                                $page = $_POST['page'];
                            }                                              

                            echo "<p class='content'>".$content[$page-1]."</p>";
                        ?>
                    </div>
                    <div id="page">Wybór strony:                     
                    <?php
                        for($page = 1; $page <= 5; $page++)
                        {
                            echo '<a class="pageNum" href="article1.php?page='.$page.'">'.$page.'</a>';
                        }
                    ?>
                    </div>
                </div>                
                <div id="quickarticle">
                    <a class="quickarticleitem" href="https:\\google.com" target="_blank">link nr 1</a>
                    <a class="quickarticleitem" href="https:\\google.com" target="_blank">link nr 2</a>
                    <a class="quickarticleitem" href="https:\\google.com" target="_blank">link nr 3</a>
                    <a class="quickarticleitem" href="https:\\google.com" target="_blank">link nr 4</a>
                </div>
            </div>
            <div id="commentsSection">
                <?php include("skrypt.php"); ?>             
                <br><br><span class = "error">* pole wymagane</span> <br><br>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <span class="commentSectionText">Nazwa: </span><input type="text" name="name">           
                    <span class="error">* <?php echo $nameErr;?></span>
                    <br><br>
                    <span class="commentSectionText">E-mail: </span><input type="text" name="email">
                    <span class="error">* <?php echo $emailErr;?></span>          
                    <br><br>
                    <span class="commentSectionText">Treść: <br></span><textarea name="comment" rows="15" cols="75"></textarea>
                    <span class="error"><?php echo $commentErr;?></span>
                    <br><br>
                    <span class="commentSectionText">Captcha (Przy dzieleniu podaj dolne przybliżenie): <br><?php echo $text ?></span>
                    <input type="text" name="captcha">
                    <span class="error">* <?php echo $captchaErr;?></span>                    
                    <br><br>
                    <input type="submit">
                </form>
            </div>
            <div id="trueFooter"></div>
            <div id="footer">
                <h3>Wykonał Wojciech Cebula</h3>
            </div>
        </div>        
    </body>
</html>