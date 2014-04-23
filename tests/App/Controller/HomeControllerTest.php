<?php
namespace Tests\App\Controller;

class HomeControllerTest extends \Tests\WebTestCase
{
	public function testIndexSuccess()
	{
		$response = $this->call('GET', '/');
        
		$this->assertTrue($response->isOK());
	}
}
