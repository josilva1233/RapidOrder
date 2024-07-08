<?php

class OrderModel {
    private $apiUrl = 'http://localhost/backend/api/orders';

    public function getAllOrders() {
        $response = file_get_contents($this->apiUrl);
        return json_decode($response, true);
    }

    public function getOrder($id) {
        $response = file_get_contents($this->apiUrl . '/' . $id);
        return json_decode($response, true);
    }

    public function createOrder($data) {
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

    public function updateOrder($id, $data) {
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

    public function deleteOrder($id) {
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
