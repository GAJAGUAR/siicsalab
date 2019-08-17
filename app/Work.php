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

  public function isValid(Request $request)
  {
    $request->validate([
      'client_id' => 'required',
      'work_name' => 'required|min:5|max:750',
      'work_nickname' => 'required|min:3|max:50',
      'work_location' => 'required|min:5|max:250'
    ]);
  }

  public function getWorks()
  {
    return $this->select('id', 'work_name')
      ->get();
  }

  public function showWork(int $id)
  {
    return $this->select('works.id', 'client_id', 'client_name', 'work_name', 'work_nickname', 'work_location')
      ->join('clients', 'clients.id', '=', 'works.client_id')
      ->where('works.id', $id)
      ->first();
  }

  public function showClientWorks(int $id)
  {
    return $this->select('id', 'work_name')
      ->where('client_id', $id)
      ->get();
  }

  public function saveWork(Request $request, Work $work)
  {
    $work->client_id = $request->get('client_id');

    $work->work_name = $request->get('work_name');

    $work->work_nickname = $request->get('work_nickname');

    $work->work_location = $request->get('work_location');

    $work->save();
  }


  public function deleteWork(int $id)
  {
    $this->find($id)
      ->delete();
  }
}
