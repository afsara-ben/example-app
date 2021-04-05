<?php

namespace App\Admin\Controllers;

use App\Models\Profile;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\User;
use Encore\Admin\Facades\Admin;

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
        $grid->column('photo', __('Uploaded Photos'));
        
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

        $form->tab('Basic info', function ($form) {

            $form->text('username')->default('afsara');
            $form->email('email')->default('afsara.benazir@gmail.com');
            // dd(Admin::user());
            // $form->text('user.name');
            // $form->text('user.email');
            
            // $form->text('name')->value(Admin::user()->name);

            // $form->multipleSelect($column = 'mobile')->options([1 => 1234, 2 => 5678, 'val' => 9101112]);  ---------?
            $form->hasMany('mobiles', function (Form\NestedForm $form) {
                $form->number('number')->default('999');
            });
        })->tab('Profile', function ($form) {

            //$form->image('avatar');
            // $form->text('address');
            // $form->mobile('phone'); -------------??
            // $form->integer('mobile'); -------------??

            $form->slider('age', 'Age')->options(['max' => 100, 'min' => 18, 'step' => 1, 'postfix' => 'years old']);
            $form->textarea($column = 'address')->rows(10)->default('polashi');

            // If there are too many options, you can add a full checkbox to it.
            // $form->checkbox($column = 'address')->options(
            //     function () {
            //         return [1 => 'address1', 2 => 'address2', 'val' => 'Option name'];
            //     }
            // )->canCheckAll();  ------- array to string conversion?

            $form->color($column = 'post_code_color')->default('#000000');

            $form->radio($column = 'gender')->options(['f' => 'Female', 'm' => 'Male'])->default('f');

            $form->ckeditor('bio')->default('default text');
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


            //IMAGE UPLOAD SECTION
            // $form->image('photo', 'Photo');
            // $form->hasMany('photos', function (Form\NestedForm $form) {
            //     $form->image('src', 'Photo');
            // });

            // Modify the image upload path and file name
            // $form->image('photo', 'Photo')->move('profile_images', 'profile_image');

            // // crop the picture
            // $form->image('photo', 'Photo')->crop(int $width, int $height, [int $x, int $y]);

            // // add watermark
            // $form->image('photo', 'Photo')->insert($watermark,'center');

            // // Add picture delete button --?
            // $form->image('photo', 'Photo')->removable();

            // // keep pictures when deleting data
            // $form->image('photo', 'Photo')->retainable();

            // // Add a download button, click to download ---?
            // $form->image('photo', 'Photo')->downloadable();

            // Generate thumbnails while uploading pictures --?
            // $form->image('photo', 'Photo')->thumbnail('small', $width = 10, $height = 10);



        })->tab('Jobs', function ($form) {

            // $startDate = $form->date('start_date');
            // $endDate = $form->date('end_date');
            // $form->dateRange($startDate, $endDate, 'Date Range');
            // $form->dateRange('start_date', 'end_date', 'Date Range');
            // $form->currency($column = 'currency')->symbol('৳');

            // $form->hasMany('jobs', function () {
            //     $form->text('company');
            //     $form->date('start_date');
            //     $form->date('end_date');
            // });

        })->tab('Files', function($form){

            // $form->file('file', 'File');

            // Modify the file upload path and file name
            // $form->file('file', 'File')->move($dir, $name);

            // // and set the upload file type
            // $form->file('file', 'File')->rules('mimes:doc,docx,xlsx');

            // // Add file delete button
            // $form->file('file', 'File')->removable();

            // // Keep files when deleting data
            // $form->file('file', 'File')->retainable();

            // Multi-picture/file upload
            // Multi-map -----???
            $form->multipleImage('photo', 'Multi Images');

            // Add delete button
            // $form->multipleImage('multiImages', 'Multi Images')->removable();

            // // multiple files ---????
            // $form->multipleFile('photos', 'Multi photos')->pathColumn('src')->removable();

            // // Add delete button
            // $form->multipleFile('multiFiles', 'Multi Files')->removable();

            // // draggable sorting since v1.6.12
            // $form->multipleImage('pictures')->sortable();

            // $form->multipleFile('attachments','Attachments')->pathColumn('path')->removable();
        }
    );

        return $form;
    }
}
