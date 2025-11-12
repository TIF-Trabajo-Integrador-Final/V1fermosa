<?php

namespace App\Livewire\Admin;

use Livewire\Component;

abstract class BaseAdminComponent extends Component
{
  /**
   * Renderiza la vista con el layout del panel de administración.
   *
   * @param string $view Nombre de la vista Livewire (ej: 'livewire.admin.carreras-index')
   * @param array $data Datos adicionales para la vista
   */
  protected function renderAdmin(string $view, array $data = [])
  {
    return view($view, $data)
      ->layout('layouts.admin', [
        'title' => 'Panel de Administración - Instituto Superior Fermosa',
      ]);
  }
}
