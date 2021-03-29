<?php

namespace App\Admin\Controllers;

use App\Models\Profile;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\User;

class ProfileController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Profile';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Profile());

        $grid->column('id', __('Id'));
        $grid->column('username', __('Username'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));
        $grid->column('age', __('Age'));
        $grid->column('bio', __('Bio'));
        $grid->column('nature', __('Nature'));
        $grid->column('post_code_color', __('Post Code Color'));
        $grid->column('mobile', __('Mobile'));
        $grid->column('start_date', __('Start Date'));
        $grid->column('end_date', __('End Date'));
        $grid->column('created_at', __('Created at'));
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
        $show = new Show(Profile::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('email', __('Email'));
        $show->field('address', __('Address'));
        $show->field('mobile', __('Mobile'));
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
        $form = new Form(new Profile());


        // $form->textarea('username', __('Username'));
        // $form->textarea('email', __('Email'));
        // $form->textarea('address', __('Address'));
        // $form->hasMany('mobiles', function (Form\NestedForm $form) {
        //     $form->number('number');
        // });

        $form->tab('Basic info', function ($form) {

            $form->text('username');
            $form->email('email');
            // $form->multipleSelect($column = 'mobile')->options([1 => 1234, 2 => 5678, 'val' => 9101112]);  ---------?

            
        })->tab('Profile', function ($form) {

            //$form->image('avatar');
            // $form->text('address');
            // $form->mobile('phone'); -------------??
            // $form->integer('mobile'); -------------??

            $form->slider('age','Age')->options(['max' => 100, 'min' => 18, 'step' => 1, 'postfix' => 'years old']);
            $form->textarea($column = 'address')->rows(10);

            // If there are too many options, you can add a full checkbox to it.
            // $form->checkbox($column = 'address')->options(
            //     function () {
            //         return [1 => 'address1', 2 => 'address2', 'val' => 'Option name'];
            //     }
            // )->canCheckAll();  ------- array to string conversion?

            $form->color($column = 'post_code_color')->default('#000000');

            $form->radio($column = 'gender')->options(['f' => 'Female', 'm' => 'Male'])->default('f');

            $form->ckeditor('bio');
            // $form->ckeditor('bio')->options(['lang' => 'en', 'height' => 500]);

            $natures = [
                'on'  => ['value' => 'good', 'text' => 'enable', 'color' => 'success'],
                'off' => ['value' => 'bad', 'text' => 'disable', 'color' => 'danger'],
            ];

            $form->switch($column = 'nature')->options($natures); // -----????

            // $form->select('username')->options(function ($id) {
            //     $user = User::find($id);
            //     if ($user) {
            //         return [$user->id => $user->name];
            //     }
            // })->ajax('/admin/api/users');  ---------------------????

        })->tab('Jobs', function ($form) {

            // $startDate = $form->date('start_date');
            // $endDate = $form->date('end_date');
            // $form->dateRange($startDate, $endDate, 'Date Range');
            $form->dateRange('start_date', 'end_date', 'Date Range');
            $form->currency($column = 'currency')->symbol('৳');

            // $form->hasMany('jobs', function () {
            //     $form->text('company');
            //     $form->date('start_date');
            //     $form->date('end_date');
            // });

        });

        return $form;
    }
}
