<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

/**
 * @property mixed id
 * @property mixed client_name
 * @property mixed client_nickname
 * @property mixed client_register
 * @property mixed client_location
 */
class Client extends Model
{
  public function works()
  {
    return $this->hasMany(Work::class);
  }

  public function isValid(Request $request)
  {
    $request->validate([
      'client_name' => 'required|min:5|max:150',
      'client_nickname' => 'required|min:3|max:50',
      'client_register' => 'nullable|max:25',
      'client_location' => 'nullable|max:250'
    ]);
  }

  public function getClients()
  {
    return $this->select('id', 'client_name')
      ->get();
  }

  public function showClient(int $id)
  {
    return $this->select('id', 'client_name', 'client_nickname', 'client_register', 'client_location')
      ->where('id', $id)
      ->first();
  }

  public function saveClient(Request $request, Client $client)
  {
    $client->client_name = $request->get('client_name');

    $client->client_nickname = $request->get('client_nickname');

    $client->client_register = $request->get('client_register');

    $client->client_location = $request->get('client_location');

    $client->save();
  }

  public function deleteClient(int $id)
  {
    $this->find($id)
      ->delete();
  }
}
