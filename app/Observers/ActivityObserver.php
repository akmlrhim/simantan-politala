<?php

namespace App\Observers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityObserver
{
  public function created($model)
  {
    $this->log('created', $model);
  }

  public function updated($model)
  {
    $this->log('updated', $model, $model->getOriginal(), $model->getChanges());
  }

  public function deleted($model)
  {
    $this->log('deleted', $model, $model->getOriginal());
  }

  protected function log($action, $model, $oldData = null, $newData = null)
  {
    if ($oldData === null && in_array($action, ['updated', 'deleted'])) {
      $oldData = $model->getOriginal();
    }

    if ($newData === null && in_array($action, ['created', 'updated'])) {
      $newData = $model->getAttributes();
    }

    ActivityLog::create([
      'user_id' => Auth::id(),
      'action' => $action,
      'table_name' => $model->getTable(),
      'record_id' => $model->getKey(),
      'old_data' => $oldData,
      'new_data' => $newData,
      'ip_address' => request()->ip(),
      'user_agent' => request()->userAgent(),
    ]);
  }
}
