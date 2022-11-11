<?php

class Evento
{
        // Properties
        private $nome;
        private $hora_inicio;
        private $hora_fim;
        private $data_evento;
        private $numero_bilhete;
        private $local_evento;
        private $promotor;
        private $cartaz;
        private $valor_evento;
        private $admin_id;
        private $descricao;

        // Methods

        function setNome($nome)
        {
                $this->nome = $nome;
        }
        function getNome()
        {
                return $this->nome;
        }


        function setHoraInicio($hora_inicio)
        {
                $this->hora_inicio = $hora_inicio;
        }
        function getHoraInicio()
        {
                return $this->hora_inicio;
        }


        function setHoraFim($hora_fim)
        {
                $this->hora_fim = $hora_fim;
        }
        function getHorafim()
        {
                return $this->hora_fim;
        }


        function setDataEvento($data_evento)
        {
                $this->data_evento = $data_evento;
        }
        function getDataEvento()
        {
                return $this->data_evento;
        }


        function setNumeroBilhete($numero_bilhete)
        {
                $this->numero_bilhete = $numero_bilhete;
        }
        function getNumeroBilhete()
        {
                return $this->numero_bilhete;
        }


        function setLocalEvento($local_evento)
        {
                $this->local_evento = $local_evento;
        }
        function getLocalEvento()
        {
                return $this->local_evento;
        }


        function setPromotor($promotor)
        {
                $this->promotor = $promotor;
        }
        function getPromotor()
        {
                return $this->promotor;
        }


        function setCartaz($cartaz)
        {
                $this->cartaz = $cartaz;
        }
        function getCartaz()
        {
                return $this->cartaz;
        }


        function setValorEvento($valor_evento)
        {
                $this->valor_evento = $valor_evento;
        }
        function getValorEvento()
        {
                return $this->valor_evento;
        }


        function setAdmin_id($admin_id)
        {
                $this->admin_id = $admin_id;
        }
        function getAdmin_id()
        {
                return $this->admin_id;
        }


        function setDescricao($descricao)
        {
                $this->descricao = $descricao;
        }
        function getDescricao()
        {
                return $this->descricao;
        }
        
}
