<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\User;

class ProjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Project';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Project());

        $grid->column('id', __('Id'));
        $grid->column('admin_user_id', __('Admin user id'));
        $grid->column('project_title', __('Project title'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Project::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('admin_user_id', __('Admin user id'));
        $show->field('project_title', __('Project title'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Project());

        $form->number('admin_user_id', __('Admin user id'))->max(3)->min(1);
        $form->text('project_title', __('Project title'));
        $form->multipleSelect('users','User')->options(User::all()->pluck('name','id'));
        // $form->checkbox('users','User')->options(User::all()->pluck('name','id'));

        return $form;
    }
}
