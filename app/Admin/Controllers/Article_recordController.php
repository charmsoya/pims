<?php

namespace App\Admin\Controllers;

use App\Models\Article_record;
use App\Models\Article_plate;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class Article_recordController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Change Article Content');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('New Article');
            $content->description('Crate a new article.');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article_record::class, function (Grid $grid) {

            $grid->id('id')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
	    return Admin::form(Article_record::class, function (Form $form) {
		    $form->switch('Online'); 
		    $form->select('plate_id', 'Parent Plate')->options(
			    function () {
				    $plates = Article_plate::select(array('id','name'))->where('is_leaf', '=', 1)->get();
				    if (count($plates)!=0) {
					    foreach ($plates as $plate) 
						    $plate_array[$plate->id]=$plate->name;
					    return $plate_array;
				    }
			    }
		    );
		    $form->display('id', 'ID');
		    $form->display('created_at', 'Created At');
		    $form->display('updated_at', 'Updated At');
		    $form->hasMany('translation', function (Form\NestedForm $form) {
			    $form->select('language', 'Lauguage')->options([1 => 'Chinese', 2 => 'English']);
			    $form->text('title');
			    $form->ckeditor('content');
		    });
        });
    }
}
