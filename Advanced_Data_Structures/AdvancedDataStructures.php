<?php
/**
 * Advanced Data Structures in PHP
 * --------------------------------
 * This file includes commented examples for:
 * - Stack
 * - Queue
 * - Linked List
 * - Tree (Binary Tree / BST)
 * - Heap (Min/Max)
 * - Hash Map
 */

// STACK (LIFO)
class Stack {
    private array $stack = [];

    public function push($value) {
        $this->stack[] = $value;
    }

    public function pop() {
        return array_pop($this->stack);
    }

    public function top() {
        return end($this->stack);
    }

    public function isEmpty(): bool {
        return empty($this->stack);
    }
}

// QUEUE (FIFO)
class Queue {
    private array $queue = [];

    public function enqueue($value) {
        array_push($this->queue, $value);
    }

    public function dequeue() {
        return array_shift($this->queue);
    }

    public function front() {
        return $this->queue[0] ?? null;
    }

    public function isEmpty(): bool {
        return empty($this->queue);
    }
}

// More structures will be filled during the session (LinkedList, Tree, Heap, Hash Map)

?>
