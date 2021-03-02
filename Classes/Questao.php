<?php

Class Questao
{
  public $pdo;

  public function cadastrarQuestaoDissertativa($materia, $tema, $enunciado, $dissertativa, $resposta, $correta, $dificuldade, $privacidade, $usuario)
  {
    global $pdo;

    //cadastrar a questão no banco de dados
    $sql = $pdo->prepare("INSERT INTO questao (Enunciado, ID_Usuario, Dissertativa, Privacidade, Dificuldade) VALUES (:e, :u, :a, :p, :d)");
    $sql->bindValue(":e", $enunciado);
    $sql->bindValue(":u", $usuario);
    $sql->bindValue(":a", $dissertativa);
    $sql->bindValue(":p", $privacidade);
    $sql->bindValue(":d", $dificuldade);
    $sql->execute();
    $idQuestao = $pdo->lastInsertId();

    //cadastrar a matéria da questão no banco de dados
    $sql = $pdo->prepare("INSERT INTO questao_materia (Materia_ID_Materia, Questao_ID_Questao_) VALUES (:m, :q)");
    $sql->bindValue(":m", $materia);
    $sql->bindValue(":q", $idQuestao);
    $sql->execute();

    $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :t, :c)");
    $sql->bindValue(":q", $idQuestao);
    $sql->bindValue(":t", $resposta);
    $sql->bindValue(":c", $correta);
    $sql->execute();

    return true;
  }

  public function cadastrarQuestaoAlternativa($materia, $tema, $enunciado, $dissertativa, $alt1, $alt2, $alt3, $alt4, $alt5, $correta, $dificuldade, $privacidade, $usuario)
  {
    global $pdo;

    //cadastrar a questão no banco de dados
    $sql = $pdo->prepare("INSERT INTO questao (Enunciado, ID_Usuario, Dissertativa, Privacidade, Dificuldade) VALUES (:e, :u, :a, :p, :d)");
    $sql->bindValue(":e", $enunciado);
    $sql->bindValue(":u", $usuario);
    $sql->bindValue(":a", $dissertativa);
    $sql->bindValue(":p", $privacidade);
    $sql->bindValue(":d", $dificuldade);
    $sql->execute();
    $idQuestao = $pdo->lastInsertId();

    //cadastrar a matéria da questão no banco de dados
    $sql = $pdo->prepare("INSERT INTO questao_materia (Materia_ID_Materia, Questao_ID_Questao_) VALUES (:m, :q)");
    $sql->bindValue(":m", $materia);
    $sql->bindValue(":q", $idQuestao);
    $sql->execute();

    $correta = strtolower($correta);
    $correta = ord($correta);
    $correta -= 96;

    $certa = 1;
    $errada = 0;

    switch($correta) {
      case 1:
        //$alt1 está Correta
        if($alt5==""){
          if($alt4==""){
            if($alt3==""){
              if($alt2==""){
                if($alt1==""){
                  return false;
                }
                else{
                  $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                  $sql->bindValue(":q", $idQuestao);
                  $sql->bindValue(":a", $alt1);
                  $sql->bindValue(":c", $certa);
                  $sql->execute();
                }
              }
              else{
                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt1);
                $sql->bindValue(":c", $certa);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt2);
                $sql->bindValue(":c", $errada);
                $sql->execute();
              }
            }
            else{
              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt1);
              $sql->bindValue(":c", $certa);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt2);
              $sql->bindValue(":c", $errada);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt3);
              $sql->bindValue(":c", $errada);
              $sql->execute();
            }
          }
          else{
            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt1);
            $sql->bindValue(":c", $certa);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt2);
            $sql->bindValue(":c", $errada);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt3);
            $sql->bindValue(":c", $errada);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt4);
            $sql->bindValue(":c", $errada);
            $sql->execute();
          }
        }
        else{
          $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
          $sql->bindValue(":q", $idQuestao);
          $sql->bindValue(":a", $alt1);
          $sql->bindValue(":c", $certa);
          $sql->execute();

          $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
          $sql->bindValue(":q", $idQuestao);
          $sql->bindValue(":a", $alt2);
          $sql->bindValue(":c", $errada);
          $sql->execute();

          $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
          $sql->bindValue(":q", $idQuestao);
          $sql->bindValue(":a", $alt3);
          $sql->bindValue(":c", $errada);
          $sql->execute();

          $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
          $sql->bindValue(":q", $idQuestao);
          $sql->bindValue(":a", $alt4);
          $sql->bindValue(":c", $errada);
          $sql->execute();

          $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
          $sql->bindValue(":q", $idQuestao);
          $sql->bindValue(":a", $alt5);
          $sql->bindValue(":c", $errada);
          $sql->execute();
        }

      break;

        case 2:
          //$alt2 está Correta
          if($alt5==""){
            if($alt4==""){
              if($alt3==""){
                if($alt2==""){
                  return false;
                }
                else{
                  $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                  $sql->bindValue(":q", $idQuestao);
                  $sql->bindValue(":a", $alt1);
                  $sql->bindValue(":c", $errada);
                  $sql->execute();

                  $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                  $sql->bindValue(":q", $idQuestao);
                  $sql->bindValue(":a", $alt2);
                  $sql->bindValue(":c", $certa);
                  $sql->execute();
                }
              }
              else{
                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt1);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt2);
                $sql->bindValue(":c", $certa);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt3);
                $sql->bindValue(":c", $errada);
                $sql->execute();
              }
            }
            else{
              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt1);
              $sql->bindValue(":c", $errada);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt2);
              $sql->bindValue(":c", $certa);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt3);
              $sql->bindValue(":c", $errada);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt4);
              $sql->bindValue(":c", $errada);
              $sql->execute();
            }
          }
          else{
            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt1);
            $sql->bindValue(":c", $errada);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt2);
            $sql->bindValue(":c", $certa);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt3);
            $sql->bindValue(":c", $errada);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt4);
            $sql->bindValue(":c", $errada);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt5);
            $sql->bindValue(":c", $errada);
            $sql->execute();
          }

        break;

        case 3:
          //$alt3 está Correta
          if($alt5==""){
            if($alt4==""){
              if($alt3==""){
                return false;
              }
              else{
                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt1);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt2);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt3);
                $sql->bindValue(":c", $certa);
                $sql->execute();
              }
            }
            else{
              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt1);
              $sql->bindValue(":c", $errada);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt2);
              $sql->bindValue(":c", $errada);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt3);
              $sql->bindValue(":c", $certa);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt4);
              $sql->bindValue(":c", $errada);
              $sql->execute();
            }
          }
          else{
            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt1);
            $sql->bindValue(":c", $errada);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt2);
            $sql->bindValue(":c", $errada);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt3);
            $sql->bindValue(":c", $certa);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt4);
            $sql->bindValue(":c", $errada);
            $sql->execute();

            $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
            $sql->bindValue(":q", $idQuestao);
            $sql->bindValue(":a", $alt5);
            $sql->bindValue(":c", $errada);
            $sql->execute();
          }
          break;

          case 4:
            //$alt4 está Correta
            if($alt5==""){
              if($alt4==""){
                return false;
              }
              else{
                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt1);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt2);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt3);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt4);
                $sql->bindValue(":c", $certa);
                $sql->execute();
              }
            }
            else{
              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt1);
              $sql->bindValue(":c", $errada);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt2);
              $sql->bindValue(":c", $errada);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt3);
              $sql->bindValue(":c", $errada);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt4);
              $sql->bindValue(":c", $certa);
              $sql->execute();

              $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
              $sql->bindValue(":q", $idQuestao);
              $sql->bindValue(":a", $alt5);
              $sql->bindValue(":c", $errada);
              $sql->execute();
            }
            break;

            case 5:
              //$alt5 está Correta
              if($alt5==""){
                return false;
              }
              else{
                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt1);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt2);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt3);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt4);
                $sql->bindValue(":c", $errada);
                $sql->execute();

                $sql = $pdo->prepare("INSERT INTO alternativa (Questao_ID_Questao_, Texto, Correta) VALUES (:q, :a, :c)");
                $sql->bindValue(":q", $idQuestao);
                $sql->bindValue(":a", $alt5);
                $sql->bindValue(":c", $certa);
                $sql->execute();
              }
              break;
    }


    return true;
  }

  public function listAll()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM questao");
    $sql->execute();
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function imagem($id_usuario){

    global $pdo;

    $sql = $pdo->prepare("SELECT ID_Imagem FROM usuario_professor WHERE ID_Usuario = :i");
    $sql->bindValue(":i", $id_usuario);
    $sql->execute();
    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      $image = $dado['ID_Imagem'];

      $sql = $pdo->prepare("SELECT Imagem FROM imagem WHERE ID_Imagem = :i");
      $sql->bindValue(":i", $image);
      $sql->execute();
      if($sql->rowCount() > 0){
        $img = $sql->fetch();
        $_SESSION['imagem_usuario'] = $img['Imagem'];
      }
  }
}
}
?>
