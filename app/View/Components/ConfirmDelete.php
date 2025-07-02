<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmDelete extends Component
{
	/**
	 * Create a new component instance.
	 */

	public $modalId;
	public $action;
	public $message;

	public function __construct($modalId, $action, $message = null)
	{
		$this->modalId = $modalId;
		$this->action = $action;
		$this->message = $message;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.confirm-delete');
	}
}
