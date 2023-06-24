<?php 

      include_once("conexao.php"); 
      include_once("url.php");

  $id; 
    
  if(!empty($_GET)){
        
        $id = $_GET["id"];
        
        }
        if(!empty($id))
        {
       
    $query= "SELECT * FROM produto WHERE id = :id";
    $stmt= $conn->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $product = $stmt->fetch();// retorna apenas a linha referente ao id
      
    }
    
    else
    {

    // pega os atributos na tabela produto e transfere para um array
    $query= "SELECT * FROM produto";
    $stmt= $conn->prepare($query);
    $stmt->execute();
    $AllProduct = [];
    $AllProduct = $stmt->fetchAll();


    }

    
    
  if(!empty($_GET)){
        
        $id = $_GET["id"];
        
        }
        if(!empty($id))
        {
       
    $query= "SELECT * FROM arquivos WHERE id = :id";
    $stmt= $conn->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $arquivos = $stmt->fetch();// retorna apenas a linha referente ao id
      
    }
    
    else
    {

    // pega os atributos na tabela produto e transfere para um array
    $query= "SELECT * FROM arquivos";
    $stmt= $conn->prepare($query);
    $stmt->execute();
    $AllArquivos = [];
    $AllArquivos = $stmt->fetchAll();


    }

    if(!empty($_POST)){
    $data = $_POST;

           
    switch ($data['type']){

      case 'create':
    try{
            //lógica para adicionar arquivos ao sistema
        if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];
            
        if($arquivo['error']){
        die("Falha ao enviar arquivo");

        }


        if($arquivo['size'] > 2097152){
            die("Arquivo muito grande, máximo 2 MB");
        }

        $pasta = "../images/";
        //pasta aonde é salvo as imagens
        $nomeDoArquivo = $arquivo['name'];
        // uniqid da um nome aleatório para o arquivo
        $novoNomeDoArquivo = uniqid();
        // muda o caracteres do arquivo para minúsculo
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        // caminho do arquivo
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        // path pega o caminho do arquivo
        $teste = move_uploaded_file($arquivo['tmp_name'], $path);
        // váriavel teste é usada para ser colocada em um if, caso o upload tenha ocorrido com sucesso o crud é iniciado
        $arquivo['path'] = $path;

        if($teste){
            try{
                $nome = $arquivo['name'];
                $path = $arquivo['path'];

                $query = "INSERT INTO arquivos (nome, path) VALUES(:nome, :path)";
                $stmt = $conn -> prepare($query);
                $stmt -> bindParam(':nome', $nome);
                $stmt -> bindParam(':path', $path);
                $stmt -> execute();
            }
           catch(PDOException $e){
            $erro = $e -> getMessage();
            echo $erro;
        }

            
        }
        echo "</a> falha ao enviar </a>";

        }

        $nome = $data['nome'];
        $descricao = $data['descricao'];
        $cod_product = $data['cod_product'];
        $quantidade = $data['quantidade'];
        $validade = $data['validade'];
        $preco = $data['preco'];
       
        

        $query = 'INSERT INTO produto (nome, descricao, cod_product, quantidade, validade, preco) VALUES  (:nome, :descricao, :cod_product, :quantidade, :validade, :preco)';
        $stmt= $conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":cod_product", $cod_product);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":validade", $validade);   
        $stmt->bindParam(":preco", $preco);
        $stmt->execute();
        }
        catch(PDOException $e){
            $erro = $e -> getMessage();
            echo $erro;
        }

        echo "sucess";
         header("Location:".$BASE_URL."/../template/tableProduct.php");    

        break;

        case 'edit':
        try {

        $nome = $data['nome'];
        $descricao = $data['descricao'];
        $cod_product = $data['cod_product'];
        $quantidade = $data['quantidade'];
        $validade = $data['validade'];
        $preco = $data['preco'];
        $idPost= $data["id"];
    
     $query = "UPDATE produto SET
        nome=:nome,
        descricao = :descricao,
        cod_product = :cod_product,
        quantidade = :quantidade,
        validade = :validade,
        preco = :preco
        WHERE id = :idPost";
    
       $stmt = $conn -> prepare($query);     
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":cod_product", $cod_product);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":validade", $validade);   
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":idPost", $idPost);
        $stmt->execute();

            
        }
        catch(PDOException $e){
        $erro = $e -> getMessage();
        echo $erro;
        }
header("Location:".$BASE_URL."/../template/tableProduct.php");    


        break;

        case 'delete':

          
            try{
                
                // id de produto e de arquivos compartilham o mesmo ID.
                $idDelete = $data['id'];
                var_dump($data['id']);
                $query= "DELETE FROM produto WHERE id = :idDelete";
                $stmt= $conn->prepare($query);
                $stmt->bindParam(":idDelete", $idDelete);
                $stmt->execute();
                
                
                $query = "DELETE FROM arquivos WHERE id = :idDelete";
                $stmt = $conn -> prepare($query);
                $stmt -> bindParam(':idDelete', $idDelete);
                $stmt -> execute();    


}    catch(PDOException $e){
$erro= $e->getMessage();
echo $erro;
}
   header("Location:".$BASE_URL."/../template/tableProduct.php");
    break;
}


 }


  




?>

