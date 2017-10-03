<html>
    <head>
        <title>Aula PHP</title>
    </head>
    <body>
        <h1>Aula PHP</h1>
        <?PHP
        $nome = 'Ramon';
        $idade=23 ;
        $telefone= 'xxxx-xxxx';
        
        echo "<p> nome: <b>" . $nome . "</b></p>";
        echo "<p> idade: <b>" . $idade . "</b></p>";
        echo "<p> telefone: <b>" . $telefone . "</b></p>";
        error_reporting(1);
        $qtd = $_GET["qtd"];
        $apenas_par = $_GET["apenas_par"];
        ?>
    
        <ul>
            <?PHP
                echo "<p> $qtd </p>";                                          
                for($i=1; $i<=$qtd; $i++ ){
                    if($i%2==0 && $apenas_par==1){
                        echo "<li> $i </li>";                     
                    }else if($apenas_par!=1){
                        echo "<li> $i </li>";                     
                    }
                }
            ?>
        </ul>
    <style>
        *{
            font-family:Helvetica;
         }
    </style>
    </body>
</html>