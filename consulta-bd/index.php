   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
   </head>

   <body>
       <div>
           <form action="#" method="post">
               <input type="checkbox" id="action" name="genres1" value="action">
               <label for="action">Action</label>

               <input type="checkbox" id="adventure" name="genres2" value="adventure" />
               <label for="aventura">Adventure</label>

               <input type="checkbox" id="crime" name="genres3" value="crime" />
               <label for="crime">crime</label>

               <input type="checkbox" id="drama" name="genres4" value="drama" />
               <label for="drama">drama</label>

               <input type="submit" value="filtrar">
           </form>
           <?php
            if (!empty($_POST)) {
                echo "teste";
                $filtro = $_POST;
                // var_dump($_POST);
                echo "a categoria que voce escolheu foi " . implode(", ", $filtro);

                $conexao = new PDO('mysql:host=localhost;dbname=bd_filmes', 'root', '');
                $query = "select * from tb_filme where genero like '%" . implode("%' or genero like '%", $filtro) . "%'";
                // var_dump($query);
                $resultado = $conexao->query($query)->fetchAll();
                
                // var_dump($resultado);
                ?>
                <table border="1">
                    <thead>
                        <th>nome</th>
                        <th>genero</th>
                        <th>ano</th>
                        <th>diretor</th>
                    </thead>
                    <tbody>

                    <?php   foreach ($resultado as $value) { ?>
                    
                        <tr><td><?= $value['nome']?></td>
                        <td><?= $value['genero']?></td>
                        <td><?= $value['ano_lancamento']?></td>
                        <td><?= $value['diretor']?></tr>


                        
                    <?php }  ?>
                     </tbody> 
                </table>


              
           <?php }


            ?>



   </body>

   </html>