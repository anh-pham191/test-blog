<?php namespace Tests\Models;

use App\Models\Blog;
use Tests\TestCase;

class BlogTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Blog $blog */
        $blog = new Blog();
        $this->assertNotNull($blog);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Blog $blog */
        $blogModel = new Blog();

        $blogData = factory(Blog::class)->make();
        foreach( $blogData->toFillableArray() as $key => $value ) {
            $blogModel->$key = $value;
        }
        $blogModel->save();

        $this->assertNotNull(Blog::find($blogModel->id));
    }

}
