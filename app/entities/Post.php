<?php
require_once('Conexao.php');

class Post
{
    private $id;
    private $titulo;
    private $texto;
    private $autor;
    private $data;
    private $database;

    public function __construct($titulo = null, $texto = null, $autor = null)
    {
        if($titulo != null) $this->titulo = $titulo;
        if($texto != null) $this->texto = $texto;
        if($autor != null) $this->autor = $autor;
        $this->database = Conexao::getInstancia();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function listar()
    {
        $conexao = $this->database->getConexao();
        $consulta = $conexao->query('SELECT * FROM post');
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Post');
    }

    public function selecionar($id)
    {
        $sql = 'SELECT * FROM post WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject('Post'); //retorna 1 registro no formato de objeto da classe Post
    }

    public function salvar()
    {
        $sql = 'INSERT INTO post (titulo, texto, autor, data) 
                    VALUES (?, ?, ?, ?)';
        $conexao = $this->database->getConexao(); //pegar a conexao
        $consulta = $conexao->prepare($sql); //preparar a consulta
        //comecar a informar os dados:
        $consulta->bindValue(1, $this->titulo, PDO::PARAM_STR);
        $consulta->bindValue(2, $this->texto, PDO::PARAM_STR);
        $consulta->bindValue(3, $this->autor, PDO::PARAM_STR);
        $consulta->bindValue(4, $this->data, PDO::PARAM_STR);
        $resultado = $consulta->execute();
        // return $resultado;
        // return $consulta->execute();
        if($resultado) return true;
        return false;
    }

    public function atualizar()
    {
        if($this->id == null) return false;


        $sql = 'UPDATE post SET titulo = ?, texto = ?, 
                autor = ?, data = ? 
                WHERE id = ?';
        
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->titulo, PDO::PARAM_STR);
        $consulta->bindValue(2, $this->texto, PDO::PARAM_STR);
        $consulta->bindValue(3, $this->autor, PDO::PARAM_STR);
        $consulta->bindValue(4, $this->data, PDO::PARAM_STR);
        $consulta->bindValue(5, $this->id, PDO::PARAM_INT);
        return $consulta->execute(); //true or false
    }

    public function excluir()
    {
        if($this->id == null) return false; //mecanismo de seguranca pra verificar se objeto e concreto
        
        $sql = 'DELETE FROM post WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->id, PDO::PARAM_INT);
        if($consulta->execute()) return true;
        $consulta->errorInfo(); //metodo do PDO que traz detalhes de erros
        return false;
    }
}