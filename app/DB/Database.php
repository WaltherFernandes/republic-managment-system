<?php
     namespace App\DB;  

    use \PDO;
    use \PDOException;

    //Odilon, para logar com o admin (superusuario), utilize admin como usuario e senha 123/nada
    //Somente usuários registrados no meu site logam nele
    //Pra te adiantar, não sei o pq está acontecendo, mas no contaTabela, o mask so está indo no primeiro

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('NAME', 'projetoweb');

class Database{

        private $table;

        private $connection;

        /**
         * Define a tabela e instacia a conexão
         */
        public function __construct($table = null)
        {
            $this->table = $table;
            $this->setConnection();
        }

        /**
         * Método responsavel por criar uma conexão com o banco de dados
         */
        private function setConnection(){
            try {
               $this->connection = new PDO('mysql:host='.HOST.';dbname='.NAME, USER, PASS);
               $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $err) {
                die('ERROR: '.$err->getMessage());
            }
        }

        /**
         * Método responsável por executar querys dentro do banco de dados
         */
        public function execute($query, $params = []){
            try {
                $statement = $this->connection->prepare($query);
                $statement->execute($params);
                return $statement; 
            } catch (PDOException $err) {
                die('ERROR: '. $err->getMessage());
            }
        }

        /**
         * Método responsável por inserir dadods no banco
         */
        public function insert($values){
            $fields = array_keys($values);
            $binds = array_pad([], count($fields), '?');

            $query = "INSERT INTO $this->table (".implode(',', $fields).") VALUES (".implode(',', $binds).")";

            $this->execute($query, array_values($values));
            
            return $this->connection->lastInsertId(); 
        }

        public function getLastInsert(){
            $query = "SELECT * FROM tbconta WHERE idConta = (SELECT MAX(idConta) FROM tbconta);";

            return $this->execute($query);
        }

        /**
         * Método responsável por executar uma consuta no banco
         */
        public function select($where = null, $order = null, $limit = null, $fields = '*', $group = null){
            $where = strlen($where) ? 'WHERE '.$where : '';
            $order = strlen($order) ? 'ORDER BY '.$order : '';
            $limit = strlen($limit) ? 'LIMIT '.$limit : '';
            $group = strlen($group) ? 'GROUP BY ' . $group : '';


            $query = 'SELECT '.$fields.' FROM '.$this->table.' '. $where. ' ' . $group . ' '. $order.' '. $limit;

            return $this->execute($query);
        }

        /**
         * Métoodo responsável por executar atualizações no banco de dados
         */
        public function update($where, $values){
            $fields = array_keys($values);

            $query = ('UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where);
            
            $this->execute($query, array_values($values));

            return true;
        }

        /**
         * Método responsável por excluir dados do banco
         */
        public function delete($where){
            $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
            $this->execute($query);

            return true;
        }

    }
?>