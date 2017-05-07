<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\BlogRepositoryInterface;

class BlogRequest extends BaseRequest
{

    /** @var \App\Repositories\BlogRepositoryInterface */
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->blogRepository->rules();
    }

    public function messages()
    {
        return $this->blogRepository->messages();
    }

}
