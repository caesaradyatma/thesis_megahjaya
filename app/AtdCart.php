<?php
namespace App;

class AtdCart
{
  public $employees = null;
  public $totAtd = 0;

  public function __construct($oldAtdCart)
  {
    if($oldAtdCart)
    {
      $this->employees = $oldAtdCart->employees;
      $this->totAtd = $oldAtdCart->totAtd;
    }
  }

  public function add($employee, $id)
  {
    $storedEmployee = ['id'=>$id, 'employee' => $employee, 'emp_name' => $employee->emp_name ];
    if($this->employees){
      if(array_key_exists($id, $this->employees)){
        $storedEmployee = $this->employees[$id];
      }
    }
    $this->totAtd ++;
    $this->employees[$id] = $storedEmployee;
  }
}
?>
