<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteDialog extends Component
{
  public $id;
  public $route;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($id, $route)
  {
    $this->id = $id;
    $this->route = $route;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.delete-dialog');
  }
}
