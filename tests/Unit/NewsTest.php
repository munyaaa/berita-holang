<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Model\News;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    private function mockNews($title, $content, $image) {
        $entity = new News;
        $entity->title = $title;
        $entity->content = $content;
        $entity->image = $image;

        return $entity;
    }

    public function testIsValid_TitleAttrIsNull_ReturnsFalse () {
        $entity = $this->mockNews(null, 'ipsum', 'dolor');
        $result = $entity->isValid();
        $this->assertFalse($result);
    }

    public function testIsValid_ContentAttrIsNull_ReturnsFalse () {
        $entity = $this->mockNews('lorem', null, 'dolor');
        $this->assertFalse($entity->isValid());
    }

    public function testIsValid_ImageAttrIsNull_ReturnsFalse () {
        $entity = $this->mockNews('lorem', 'ipsum', null);
        $this->assertFalse($entity->isValid());
    }

    public function testIsValid_AttrIsValid_ReturnsTrue () {
        $entity = $this->mockNews('lorem', 'ipsum', 'dolor');
        $this->assertTrue($entity->isValid());
    }
}
