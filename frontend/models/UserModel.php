<?php

class UserModel {
    private $apiUrl = 'http://localhost/rapidorder/backend/api/users';

    public function getAllUsers() {
        $response = file_get_contents($this->apiUrl);
        return json_decode($response, true);
    }

    public function getUser($id) {
        $response = file_get_contents($this->apiUrl . '/' . $id);
        return json_decode($response, true);
    }

    public function createUser($data) {
        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($this->apiUrl, false, $context);
        return json_decode($response, true);
    }

    public function updateUser($id, $data) {
        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n",
                'method' => 'PUT',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($this->apiUrl . '/' . $id, false, $context);
        return json_decode($response, true);
    }

    public function deleteUser($id) {
        $options = [
            'http' => [
                'method' => 'DELETE',
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($this->apiUrl . '/' . $id, false, $context);
        return json_decode($response, true);
    }
}
