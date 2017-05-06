<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\PaginationRequest;
use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;
use Response;

class BlogController extends Controller
{

    /** @var \App\Repositories\BlogRepositoryInterface */
    protected $blogRepository;


    public function __construct(
        BlogRepositoryInterface $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\PaginationRequest $request
     * @return \Response
     */
    public function index(PaginationRequest $request)
    {
        $offset = $request->offset();
        $limit = $request->limit();
        $count = $this->blogRepository->count();
        $models = $this->blogRepository->get('id', 'desc', $offset, $limit);

        return view('pages.admin.blogs.index', [
            'models' => $models,
            'count' => $count,
            'offset' => $offset,
            'limit' => $limit,
            'baseUrl' => action('Admin\BlogController@index'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        return view('pages.admin.blogs.edit', [
            'isNew' => true,
            'blog' => $this->blogRepository->getBlankModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Response
     */
    public function store(BlogRequest $request)
    {
        $input = $request->only(['title', 'main_image', 'body', 'summary']);

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $model = $this->blogRepository->create($input);

        if (empty($model)) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\BlogController@index')
            ->with('message-success', trans('admin.messages.general.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Response
     */
    public function show($id)
    {
        $model = $this->blogRepository->find($id);
        if (empty($model)) {
            abort(404);
        }

        return view('pages.admin.blogs.edit', [
            'isNew' => false,
            'blog' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param      $request
     * @return \Response
     */
    public function update($id, BlogRequest $request)
    {
        /** @var \App\Models\Blog $model */
        $model = $this->blogRepository->find($id);
        if (empty($model)) {
            abort(404);
        }
        $input = $request->only(['title', 'main_image', 'body', 'summary']);

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->blogRepository->update($model, $input);

        return redirect()->action('Admin\BlogController@show', [$id])
            ->with('message-success', trans('admin.messages.general.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Response
     */
    public function destroy($id)
    {
        /** @var \App\Models\Blog $model */
        $model = $this->blogRepository->find($id);
        if (empty($model)) {
            abort(404);
        }
        $this->blogRepository->delete($model);

        return redirect()->action('Admin\BlogController@index')
            ->with('message-success', trans('admin.messages.general.delete_success'));
    }

    public function showBlogs()
    {
        $blogs = $this->blogRepository->all();
        return Response::json([
            'data' => $blogs
        ]);
    }
    
    public function storeBlog(BlogRequest $request){
        return Response::json([
            'data' => $this->blogRepository->create($request->all())
        ]);
    }

}
