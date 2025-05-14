<?php


class Stack
{
  protected  array $stack = [];

  public function push($value)
  {
    $this->stack[] = $value;
  }

  public function pop()
  {
    return array_pop($this->stack);
  }


  public function isEmpty()
  {
    return empty($this->stack);
  }

  public function peek()
  {
    return end($this->stack);
  }

  public function get_items()
  {
    return  $this->stack;
  }
}
