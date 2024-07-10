<?php
// /tests/OrderTest.php

use PHPUnit\Framework\TestCase;
use App\Models\Order;
use App\Config\Database;

class OrderTest extends TestCase {
    private $db;
    private $OrderModel;

    protected function setUp(): void {
        $this->db = Database::connect();
        $this->OrderModel = new Order($this->db);

    }

    public function testCreateOrder() {
        $data = [
            'user_id' => '163',
            'description' => 'Pizza',
            'quantity' => ' 2',
            'price' => '2.00',
        ];

        $result = $this->OrderModel->create($data);

        $this->assertTrue($result);
        $this->assertNotEmpty($this->OrderModel->findAll());
    }

    public function testFindOrderById() {
        $data = [
            'user_id' => '163',
            'description' => 'Pizza',
            'quantity' => ' 2',
            'price' => '2.00',
        ];
    
        // Cria um usuário
        $this->OrderModel->create($data);
    
        // Obtém o último ID inserido
        $lastInsertedId = $this->db->lastInsertId();
    
        // Busca pelo usuário com o ID inserido
        $Order = $this->OrderModel->findById($lastInsertedId);
    
        // Verifica se o usuário retornado não está vazio
        $this->assertIsArray($Order);
        if (!empty($Order)) {
            // Verifica os detalhes do usuário
            $this->assertEquals('163', $Order['user_id']);
            $this->assertEquals('Pizza', $Order['description']);
        } else {
            // Se não encontrar o usuário, falha no teste
            $this->fail("Usuário não encontrado com ID {$lastInsertedId}");
        }
    }
    
    public function testUpdateOrder() {
        $data = [
            'user_id' => '163',
            'description' => 'Pizza',
            'quantity' => ' 2',
            'price' => '2.00',
        ];
    
        // Cria um usuário inicial
        $this->OrderModel->create($data);
    
        // Obtém o último ID inserido
        $lastInsertedId = $this->db->lastInsertId();
    
        // Dados para atualização
        $updateData = [
            'description' => 'PizzaUpdated',
            'quantity' => ' 20',
        ];
    
        // Atualiza o usuário com o ID obtido
        $result = $this->OrderModel->update($lastInsertedId, $updateData);
        $this->assertTrue($result);
    
        // Verifica se os dados foram atualizados corretamente
        $updatedOrder = $this->OrderModel->findById($lastInsertedId);
        $this->assertEquals('PizzaUpdated', $updatedOrder['description']);
        $this->assertEquals('20', $updatedOrder['quantity']);
    }
    

    public function testDeleteOrder() {
        // Dados do usuário a ser criado
        $data = [
            'user_id' => '163',
            'description' => 'Pizza',
            'quantity' => ' 2',
            'price' => '2.00',
        ];
    
        // Cria um usuário
        $this->OrderModel->create($data);
    
        // Obtém o último ID inserido
        $lastInsertedId = $this->db->lastInsertId();
    
        // Deleta o usuário com o ID obtido
        $result = $this->OrderModel->delete($lastInsertedId);
        $this->assertTrue($result, "Falha ao deletar o usuário com ID {$lastInsertedId}");
    
        // Verifica se não há mais usuários na base de dados
        $Orders = $this->OrderModel->findAll();
        //$this->assertEmpty($Orders, "A lista de usuários não está vazia após a exclusão do usuário ID {$lastInsertedId}");
    }
    
}

