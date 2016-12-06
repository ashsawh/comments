<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\Comments;

class MoneyTest extends TestCase
{
    public function testCanBeNegated()
    {
        // instantiate action


        // We need a request and response object to invoke the action
        $environment = \Slim\Http\Environment::mock(
            [
                'REQUEST_METHOD' => 'POST',
                'REQUEST_URI' => '/comments',
                'CONTENT_TYPE' => 'application/json',
                'QUERY_STRING'=>'foo=bar'
            ]
        );
        $request = \Slim\Http\Request::createFromEnvironment($environment);
        $response = new \Slim\Http\Response();
        $container = new \Slim\Container;
        $action = new Comments($container);

        // run the controller action and test it
        $response = $action->save($request, $response, []);
        $this->assertSame((string)$response->getBody(), '{"foo":"bar"}');
    }
}