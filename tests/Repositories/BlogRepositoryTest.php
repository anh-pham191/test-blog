<?php namespace Tests\Repositories;

use App\Models\Blog;
use Tests\TestCase;

class BlogRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\BlogRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BlogRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $blogs = factory(Blog::class, 3)->create();
        $blogIds = $blogs->pluck('id')->toArray();

        /** @var  \App\Repositories\BlogRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BlogRepositoryInterface::class);
        $this->assertNotNull($repository);

        $blogsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Blog::class, $blogsCheck[0]);

        $blogsCheck = $repository->getByIds($blogIds);
        $this->assertEquals(3, count($blogsCheck));
    }

    public function testFind()
    {
        $blogs = factory(Blog::class, 3)->create();
        $blogIds = $blogs->pluck('id')->toArray();

        /** @var  \App\Repositories\BlogRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BlogRepositoryInterface::class);
        $this->assertNotNull($repository);

        $blogCheck = $repository->find($blogIds[0]);
        $this->assertEquals($blogIds[0], $blogCheck->id);
    }

    public function testCreate()
    {
        $blogData = factory(Blog::class)->make();

        /** @var  \App\Repositories\BlogRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BlogRepositoryInterface::class);
        $this->assertNotNull($repository);

        $blogCheck = $repository->create($blogData->toFillableArray());
        $this->assertNotNull($blogCheck);
    }

    public function testUpdate()
    {
        $blogData = factory(Blog::class)->create();

        /** @var  \App\Repositories\BlogRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BlogRepositoryInterface::class);
        $this->assertNotNull($repository);

        $blogCheck = $repository->update($blogData, $blogData->toFillableArray());
        $this->assertNotNull($blogCheck);
    }

    public function testDelete()
    {
        $blogData = factory(Blog::class)->create();

        /** @var  \App\Repositories\BlogRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BlogRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($blogData);

        $blogCheck = $repository->find($blogData->id);
        $this->assertNull($blogCheck);
    }

}
