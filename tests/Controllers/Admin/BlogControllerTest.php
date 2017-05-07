<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class BlogControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\BlogController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\BlogController::class);
        $this->assertNotNull($controller);
    }

    public function setUp()
    {
        parent::setUp();
        $authUser = \App\Models\AdminUser::first();
        $this->be($authUser, 'admins');
    }

    public function testGetList()
    {
        $response = $this->action('GET', 'Admin\BlogController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\BlogController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $blog = factory(\App\Models\Blog::class)->make();
        $this->action('POST', 'Admin\BlogController@store', [
                '_token' => csrf_token(),
            ] + $blog->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $blog = factory(\App\Models\Blog::class)->create();
        $this->action('GET', 'Admin\BlogController@show', [$blog->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $blog = factory(\App\Models\Blog::class)->create();

        $name = $faker->name;
        $id = $blog->id;

        $blog->name = $name;

        $this->action('PUT', 'Admin\BlogController@update', [$id], [
                '_token' => csrf_token(),
            ] + $blog->toArray());
        $this->assertResponseStatus(302);

        $newBlog = \App\Models\Blog::find($id);
        $this->assertEquals($name, $newBlog->name);
    }

    public function testDeleteModel()
    {
        $blog = factory(\App\Models\Blog::class)->create();

        $id = $blog->id;

        $this->action('DELETE', 'Admin\BlogController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkBlog = \App\Models\Blog::find($id);
        $this->assertNull($checkBlog);
    }

}
