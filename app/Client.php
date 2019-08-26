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
 * @method static findOrFail(int $id)
 */
class Client extends Model
{
  public function works()
  {
    return $this->hasMany(Work::class);
  }

  public function saveClient(Request $request, Client $client)
  {
    $client->client_name = $request->get('client_name');

    $client->client_nickname = $request->get('client_nickname');

    $client->client_register = $request->get('client_register');

    $client->client_location = $request->get('client_location');

    $client->save();
  }
}
