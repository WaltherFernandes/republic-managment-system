<?php
    namespace App\Entity;

    use App\DB\Database;

    use \PDO;

class rep{

        /**
         * Declaração das variáveis que serão cadastrados no objeto e salvos na DB
         * Declaration of the variables that will be registered in the object and saved in the DB;
         */
        public $idMorador;

        public $nome;

        public $CPF;

        public $dataNascimento;
        
        public $celular;

        public $email;
        
        public $senha;

        public $foto;

        public $contato;

        public $tipo;

        public $idTipo;

        /**
         * Método responsável por registrar moradores novos no banco de dados
         * MEthod responsible to register new residents in database
         */
        public function cadastrarMorador(){

            $obDatabase = new Database('tbMorador');
            $this->idMorador = $obDatabase->insert([
                                                    'nome'=>$this->nome,
                                                    'CPF'=>$this->CPF,
                                                    'dataNascimento'=>$this->dataNascimento,
                                                    'celular'=>$this->celular,
                                                    'email'=>$this->email,
                                                    'senha'=>$this->senha,
                                                    'foto'=>$this->foto,
                                                    'contato'=>$this->contato
                                                ]);

            return true;
        }

        /**
         * Método responsável por atualizar moradores no banco
         * Method responsible for upadate  residents
         */
        public function atualizarMorador($idMorador){
            return (new Database('tbMorador'))->update('idMorador = '.$idMorador, [
                                                                                'nome'=>$this->nome,
                                                                                'CPF'=>$this->CPF,
                                                                                'dataNascimento'=>$this->dataNascimento,
                                                                                'celular'=>$this->celular,
                                                                                'email'=>$this->email,
                                                                                'senha'=>$this->senha,
                                                                                'foto'=>$this->foto,
                                                                                'contato'=>$this->contato
                                                                                ]);
        }

         /**
         * Método responsável por excluir moradores do banco de dados
         * Method responsible for exclude residents in database
         */
        public function excluirMorador($idMorador){
            return (new Database('tbMorador'))->delete('idMorador = '. $idMorador); 
        }

        /**
         * Método responsável por cadastrar os tipos de conta
         * Methdo reponsable fot register new account types
         */
        public function cadastrarTipo(){
            $obDatabase = new Database('tbTipo');
            $this->idTipo = $obDatabase->insert([
                                                'nome'=>$this->tipo  
                                                ]);
        }

        /**
         * Método responsável por  atualizar os tipos de conta
         * Method responsible for update accounts types
         */
        public function atualizarTipo($idTipo){
            return (new Database('tbTipo'))->update('idTipo = '.$idTipo, [
                                                                        'nome'=>$this->tipo
                                                                        ]);
        }

        /**
         * Método responsável por excluir os tipos de conta do banco de dados
         * Method responsible for exclude account types in database
         */
        public function excluirTipo($idTipo){
            return (new Database('tbTipo'))->delete('idTipo = '. $idTipo); 
        }

        /**
         * Método responsável por cadastrar contas no banco de dados
         * Method responsible for register accounts at database
         */
        public function cadastrarConta(){

            $obDatabase = new Database('tbConta');
            $this->idMorador = $obDatabase->insert([
                                                    'descricao'=>$this->descricao,
                                                    'idMoradorResponsavel'=>$this->idMoradorResponsavel, 
                                                    'idTipo'=>$this->idTipo,
                                                    'dataVencimento'=>$this->dataVencimento,
                                                    'valor'=>$this->valor,
                                                    'estado'=>$this->estado,
                                                    'observacao'=>$this->observacao
                                                ]);

            return true;
        }

        /**
         * Método responsável por atualizar as contas do banco de dados
         * Methos responsible for update account at database
         */
        public function atualizarConta($idConta){
            return (new Database('tbConta'))->update('idConta = '.$idConta, [
                                                                                'descricao'=>$this->descricao,
                                                                                'idMoradorResponsavel'=>$this->idMorador,
                                                                                'idTipo'=>$this->idTipo,
                                                                                'dataVencimento'=>$this->dataVencimento,
                                                                                'valor'=>$this->valor,
                                                                                'estado'=>$this->estado,
                                                                                'observacao'=>$this->observacao
                                                                                ]);
        }

         /**
          * Método responsável por excluir contas do banco de dados
          * Method responsible for deleting accounts from the database
          */
        public function excluirConta($idConta){
            return (new Database('tbConta'))->delete('idConta = '. $idConta); 
        }

        /**
         * Método responsável por excluir conta em cascata com base no idTipo
         * Method responsible for exclude accounts in cascade based on idTipo
         */
        public function excluirContaByTipo($idTipo){
            return(new Database('tbConta'))->delete('idTipo = ' . $idTipo);
        }

        /**
         * Função responsável por cadastrar rateios na conta
         * Function responsible for registering apportionments in the account
         */
        public function cadastrarRateio(){

            $obDatabase = new Database('tbRateio');
            $this->idMorador = $obDatabase->insert([
                                                    'valor'=>$this->valor,
                                                    'situacao'=>$this->situacao,
                                                    'idMorador'=>$this->idMorador,
                                                    'idConta'=>$this->idConta
                                                ]);

            return true;
        }

        /**
         * Método responsável por atualizar as situações dos rateios do banco de dados
         * Methos responsible for update apportionments's situations at database
         */
        public function atualizarRateio($idRateio){
            return (new Database('tbRateio'))->update('idRateio = '.$idRateio, [
                                                                            'valor'=>$this->valor,
                                                                            'situacao'=>$this->situacao,
                                                                            'idMorador'=>$this->idMorador,
                                                                            'idConta'=>$this->idConta
                                                                                ]);
        }

         /**
          * Método responsável por excluir rateios do banco de dados
          * Method responsible for deleting apportionments from the database
          */
          public function excluirRateio($idRateio){
            return (new Database('tbRateio'))->delete('idRateio = '. $idRateio); 
        }   
        
        /**
         * Método responsável por cadastrar histórico de contas
         * Method responsible for create historics from DB
         */
        public function cadastrarHistórico(){
            $obDB = new Database('tbHistorico');
            $this->idMorador = $obDB->insert([
                                                    'data'=>$this->data,
                                                    'estado'=>$this->estado,
                                                    'idConta'=>$this->idConta,
                                                    'idMorador'=>$this->idMorador
                                                    ]);
        }

        public function excluirHistoricos($idConta){
            return (new Database('tbHistorico'))->delete('idConta = '. $idConta);
        }

        public function excluirHistoricosPorMorador($idMorador){
            return (new Database('tbHistorico'))->delete('idMorador = '. $idMorador);
        }

        /**
         * Método responsável por obter os moradores do banco de dados
         * Methos responsible for get residents from database
         */
        public static function getMoradores($where = null, $order = null, $limit = null){
            
            return (new Database('tbMorador'))->select($where, $order, $limit)
                                              ->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        /**
         * Método responsável por buscar uma vaga com base em seu id
         * Method responsible for search vacancy at database based at id
         */
        public static function getMorador($id){
             return (new Database('tbMorador'))->select('idMorador = '.$id)
                                           ->fetchObject(self::class);
        }

        /**
         * Método responsável por obter os tipos de conta de dentro do DB
         * Methdo responsible for get account types from database
         */
        public static function getTipos($where = null, $order = null, $limit = null){
            return (new Database('tbTipo'))->select($where, $order, $limit)
                                           ->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        /**
         * Método responsável por buscar um tipo de conta com base em seu ID
         * Method responsible for get account type from database based on ID
         */
        public static function getTipo($id){
            return (new Database('tbTipo'))->select('idTipo = '.$id)
                                           ->fetchObject(self::class);
        }

        /**
         * Método responsável por buscar as contas dentro do banco de dados
         * Method resposible for search accounts from database
         */
        public static function getContas($where = null, $order = null, $limit = null){
            return (new Database('tbConta'))->select($where, $order, $limit)
                                           ->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        /**
         * Método responsável por buscar uma conta específica dentro do banco de dados com base em seu ID
         * Method responsible to search specific account at database based on ID
         */
        public static function getConta($id){
            return (new Database('tbConta'))->select('idConta = '.$id)
                                           ->fetchObject(self::class);
        }

        /**
         * Método responsável por buscar os rateios dentro do banco de dados
         * Method resposible for search apportionments from database
         */
        public static function getRateios($where = null, $order = null, $limit = null){
            return (new Database('tbRateio'))->select($where, $order, $limit)
                                           ->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        /**
         * Método responsável por buscar um rateio específico dentro do banco de dados com base em seu ID
         * Method responsible to search specific apportionment at database based on ID
         */
        public static function getRateio($id){
            return (new Database('tbRateio'))->select('idRateio = '.$id)
                                           ->fetchObject(self::class);
        }

        public static function getHistoricos($where = null, $order = null, $limit = null){
            return (new Database('tbHistorico'))->select($where, $order, $limit)
                                           ->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function updatePass($idMorador, $senha){
            (new Database('tbMorador'))->update('idMorador = '.$idMorador, [
                                                                            'senha'=>$senha
                                                                            ]);
        }

        public static function getLastId(){
            return(new Database(null))->getLastInsert()
                                    ->fetchObject(self::class);
        }

        public static function getMoradorByMoney($dataInicial, $dataFinal){
            return(new Database('tbMorador AS M, tbRateio AS R, tbConta AS C'))->select("
                                                        R.idMorador = M.idMorador
                                                        AND C.idConta = R.idConta
                                                        AND C.dataVencimento BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . "'",
                                                        'M.nome',
                                                        null,
                                                        'M.nome, SUM(R.valor) AS total',
                                                        'M.nome');
        }

        public static function getTipoByMoney($dataInicial, $dataFinal){
            return(new Database('tbTipo AS T, tbConta AS C'))->select("
                                                        C.idTipo = T.idTipo
                                                        AND C.dataVencimento BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . "'",
                                                        'T.nome',
                                                        null,
                                                        'T.nome, SUM(C.valor) AS total',
                                                        'T.nome');
        }

        public static function getRateiosForConta($idMorador){
            return(new Database('tbConta AS C, tbRateio AS R, tbTipo AS T, tbMorador AS M'))->select("
                                                                                    C.idConta = R.idConta
                                                                                    AND R.idMorador = $idMorador
                                                                                    AND R.situacao = 1
                                                                                ",
                                                                                "C.descricao",
                                                                                null,
                                                                                "C.descricao, C.valor AS valorConta, T.nome as nomeTipo, C.dataVencimento, R.valor AS valorRateio",
                                                                                "C.descricao"
                                                                            )->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function getContasIndex($inicio, $final){
            return(new Database('tbConta AS C, tbTipo AS T, tbMorador AS M'))->select(
                                                                        "C.idTipo = T.idTipo
                                                                            AND C.idMoradorResponsavel = M.idMorador
                                                                            AND C.dataVencimento BETWEEN '$inicio' AND '$final'",
                                                                        "C.descricao",
                                                                        null,
                                                                        "C.descricao, T.nome AS nomeTipo, M.nome AS nomeMorador, C.dataVencimento, C.estado, C.valor",
                                                                        "C.descricao"
                                                                        )->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function excluirRateiosPorConta($idConta){
            return (new Database('tbRateio'))->delete('idConta = '. $idConta); 
        }

        public static function excluirRateiosPorMorador($idMorador){
            return (new Database('tbRateio'))->delete('idMorador = '. $idMorador); 
        }
    }
?>