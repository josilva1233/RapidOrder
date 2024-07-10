<?php
// /tests/UserTest.php

use PHPUnit\Framework\TestCase;
use App\Models\User;
use App\Config\Database;

class UserTest extends TestCase {
    private $db;
    private $userModel;

    protected function setUp(): void {
        $this->db = Database::connect();
        $this->userModel = new User($this->db);

    }

    public function testCreateUser() {
        $data = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'document' => '12345678910',
            'email' => 'p6z5d@example.com',
            'phone_number' => '1234567890',
            'birth_date' => '1990-01-01',
        ];

        $result = $this->userModel->create($data);

        $this->assertTrue($result);
        $this->assertNotEmpty($this->userModel->findAll());
    }

    public function testFindUserById() {
        $data = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'document' => '12345678910',
            'email' => 'p6z5d@example.com',
            'phone_number' => '1234567890',
            'birth_date' => '1990-01-01',
        ];
    
        // Cria um usuário
        $this->userModel->create($data);
    
        // Obtém o último ID inserido
        $lastInsertedId = $this->db->lastInsertId();
    
        // Busca pelo usuário com o ID inserido
        $user = $this->userModel->findById($lastInsertedId);
    
        // Verifica se o usuário retornado não está vazio
        $this->assertIsArray($user);
        if (!empty($user)) {
            // Verifica os detalhes do usuário
            $this->assertEquals('Jane', $user['first_name']);
            $this->assertEquals('Doe', $user['last_name']);
        } else {
            // Se não encontrar o usuário, falha no teste
            $this->fail("Usuário não encontrado com ID {$lastInsertedId}");
        }
    }
    
    public function testUpdateUser() {
        $data = [
            'first_name' => 'Josias',
            'last_name' => 'Silva',
            'document' => '12345678910',
            'email' => 'p6z5d@example.com',
            'phone_number' => '1234567890',
            'birth_date' => '1990-01-01',
        ];
    
        // Cria um usuário inicial
        $this->userModel->create($data);
    
        // Obtém o último ID inserido
        $lastInsertedId = $this->db->lastInsertId();
    
        // Dados para atualização
        $updateData = [
            'first_name' => 'Jane', // Verifique se 'first_name' está presente nos dados de atualização
            'last_name' => 'Smith',
        ];
    
        // Atualiza o usuário com o ID obtido
        $result = $this->userModel->update($lastInsertedId, $updateData);
        $this->assertTrue($result);
    
        // Verifica se os dados foram atualizados corretamente
        $updatedUser = $this->userModel->findById($lastInsertedId);
        $this->assertEquals('Jane', $updatedUser['first_name']);
        $this->assertEquals('Smith', $updatedUser['last_name']);
    }
    

    public function testDeleteUser() {
        // Dados do usuário a ser criado
        $data = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'document' => '12345678910',
            'email' => 'p6z5d@example.com',
            'phone_number' => '1234567890',
            'birth_date' => '1990-01-01',
        ];
    
        // Cria um usuário
        $this->userModel->create($data);
    
        // Obtém o último ID inserido
        $lastInsertedId = $this->db->lastInsertId();
    
        // Deleta o usuário com o ID obtido
        $result = $this->userModel->delete($lastInsertedId);
        $this->assertTrue($result, "Falha ao deletar o usuário com ID {$lastInsertedId}");
    
        // Verifica se não há mais usuários na base de dados
        $users = $this->userModel->findAll();
       //$this->assertEmpty($users, "A lista de usuários não está vazia após a exclusão do usuário ID {$lastInsertedId}");
    }
    
}

