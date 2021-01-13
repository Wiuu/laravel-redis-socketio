<?php
/**
 * Created by PhpStorm.
 * User: wiuu
 * Date: 06/01/21
 * Time: 22:59
 */
namespace app\Http\Controllers\Socket;

use App\Events\SendSocketEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

class SocketController extends Controller
{
    private $request;
    private $params;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->params = $this->request->all();
    }

    public function sendEvent()
    {
        Redis::publish('test-channel', json_encode($this->params));
        return ['message' => 'event sent'];
    }

    public function envCheck()
    {
        return env($this->params['env_variable']);
    }

}
