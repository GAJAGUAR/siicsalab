<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

/**
 * @property mixed id
 * @property mixed client_id
 * @property mixed work_name
 * @property mixed work_nickname
 * @property mixed work_location
 */
class Work extends Model
{
  public function client()
  {
    return $this->belongsTo(Client::class);
  }

  public function workOrders()
  {
    return $this->hasMany(WorkOrder::class);
  }

  public function saveWork(Request $request, Work $work)
  {
    $work->client_id = $request->get('client_id');

    $work->work_name = $request->get('work_name');

    $work->work_nickname = $request->get('work_nickname');

    $work->work_location = $request->get('work_location');

    $work->save();
  }
}
