 <?php
   
   session_start();
   include_once("conexao.php");
   include('verificarlogin.php');

   $msg = false;

   if (isset($_FILES ['arquivo'])) {
      
         $extensao = strtolower ( substr($_FILES, ['arquivo']['name'], -4));
         $novo_nome = md5(time()) . $extensao;
         $diretorio = "bemvindo/";

         move_uploaded_file($_FILES, ['arquivo']['tmp_name'], $diretorio.$novo_nome);

         $sql_code = "INSERT INTO arquivo (adicionar, ver, remover) VALUES (null,'$novo_nome',  )";
         if ($mysqli-> query($sql_code))
            $msg = "Arquivo enviado com sucesso!";
         else
            $msg = "Falha ao enviar arquivo"; 
   }
?>