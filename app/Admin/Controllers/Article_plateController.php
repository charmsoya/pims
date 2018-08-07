<?php

namespace App\Admin\Controllers;

use App\Models\Article_plate;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class Article_plateController extends Controller
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

            $content->header('Plate List');
            $content->description('Browse all the plates in this site');
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

            $content->header('header');
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

            $content->header('header');
	    $content->description('description');
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
        return Admin::grid(Article_plate::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name();
	    $grid->translate_name();
	    $grid->is_leaf();
	    $grid->parent_id();
	    $grid->level();
        });
    }

    /**
     * Make a form builder for creating a new plate.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Article_plate::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', 'Plate Name')->rules('required');
	    $form->text('translate_name', 'Plate Translate Name')->rules('required');
	    $form->switch('is_leaf', 'Is Leaf');
	    $form->select('parent_id', 'Parent Plate')->options(
		    function () {
			    $plates = Article_plate::select(array('id','name'))->where('is_leaf', '=', 0)->get();
			    if (count($plates)!=0) {
				    foreach ($plates as $plate) 
					    $plate_array[$plate->id]=$plate->name;
					    return $plate_array;
			    }
		    }
	    );
	    $form->hidden('level');
	    $form->saving (
		    function (Form $form) {
			    $parent_level = Article_plate::select(array('level'))->where('id', '=', $form->parent_id)->get();
			    $form->level = 1 + $parent_level[0]->level;
		    }
	    );
        });
    }
}
