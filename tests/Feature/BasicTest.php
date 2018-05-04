<?php

namespace Tests\Feature;
use App\Container;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTest extends TestCase
{
	public function testHashItemInBox()
	{
		$container = new Container(['book', 'files', 'phones']);

		$this->assertTrue($container->has('book'));
		$this->assertFalse($container->has('flower'));
	}

	 public function testOutOfContainer()
    {
        $container = new container(['phones']);

        $this->assertEquals('phones', $container->takeOne());

        $this->assertNull($container->takeOne());
    }

    public function testStartsWithALetter()
    {
        $container = new container(['wallet', 'toolbox', 'telephone', 'photos', 'timetable']);

        $results = $container->startsWith('t');

        $this->assertCount(3, $results);
        $this->assertContains('timetable', $results);
        $this->assertContains('telephone', $results);
        $this->assertContains('toolbox', $results);

        // Empty array if passed even
        $this->assertEmpty($container->startsWith('s'));
    }
}
