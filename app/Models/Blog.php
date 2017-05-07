<?php namespace App\Models;



class Blog extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'title',
        'main_image',
        'body',
        'summary',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\BlogPresenter::class;

    // Relations
        public function admin()
    {
        return $this->belongsTo(\App\Models\Admin::class, 'admin_id', 'id');
    }


    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'admin_id' => $this->admin_id,
            'title' => $this->title,
            'main_image' => $this->main_image,
            'body' => $this->body,
            'summary' => $this->summary,
        ];
    }

}
