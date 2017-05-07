<?php namespace App\Repositories\Eloquent;

use \App\Repositories\BlogRepositoryInterface;
use \App\Models\Blog;

/**
 *
 * @method \App\Models\Blog[] getEmptyList()
 * @method \App\Models\Blog[]|\Traversable|array all($order = null, $direction = null)
 * @method \App\Models\Blog[]|\Traversable|array get($order, $direction, $offset, $limit)
 * @method \App\Models\Blog create($value)
 * @method \App\Models\Blog find($id)
 * @method \App\Models\Blog[]|\Traversable|array allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\Blog[]|\Traversable|array getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\Blog update($model, $input)
 * @method \App\Models\Blog save($model);
 */

class BlogRepository extends SingleKeyModelRepository implements BlogRepositoryInterface
{

    public function getBlankModel()
    {
        return new Blog();
    }

    public function rules()
    {
        return [
        ];
    }

    public function messages()
    {
        return [
        ];
    }

}
