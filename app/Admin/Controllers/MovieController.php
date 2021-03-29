<?php

namespace App\Admin\Controllers;

use App\Models\Movie;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Movie';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movie());

        $grid->column('id', __('Id'));
        // $grid->column('title', __('Title'));

        // $grid->column('title')->setAttributes(['style' => 'color:red;']);
        $grid->column('title')->help('This column mentions the title...');

        $grid->column('director', __('Director'));
        $grid->column('describe', __('Describe'));
        $grid->column('rate', __('Rate'));
        $grid->released('Release?')->display(function ($released) {
            return $released ? 'yes' : 'no';
        });
        // $grid->column('release_at', __('Released at'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

        // $grid->username('Username');
        // $grid->release_at();
        $grid->created_at();
        $grid->updated_at();

        // $grid->filter(function ($filter) {
        //     // Sets the range query for the created_at field
        //     $filter->between('created_at', 'Created Time')->datetime();
        // });


        //modify the source data
        // $grid->model()->where('id', '>', 100);
        // $grid->model()->whereIn('id', [1, 2, 3]);
        // $grid->model()->whereBetween('votes', [1, 100]);
        // $grid->model()->whereColumn('updated_at', '>', 'created_at');
        // $grid->model()->orderBy('id', 'desc');
        // $grid->model()->take(100);

        $grid->paginate(15);

        // $grid->column('first_name');
        // $grid->column('last_name');

        // // column not in table
        // $grid->column('full_name')->display(function () {
        //     return $this->first_name . ' ' . $this->last_name;
        // });

        // $grid->column('desc')->style('max-width:10px;word-break:break-all;');


        // $grid->images();

        // "['foo.jpg', 'bar.png']"

        // chain method calls to display multiple images ??
        // $grid->images()->display(function ($images) {

        //     return json_decode($images, true);

        // })->map(function ($path) {

        //     return 'http://example-app.local/images/'. $path;

        // })->image();

        // $grid->column('title')->display(function ($title) {

        //     return "<span style='color:blue'>$title</span>";
        // });

        // $grid->column('gender')->using(['f' => 'female', 'm' => 'male']);
        // $grid->column('gender1')->using(['f' => 'female', 'm' => 'male']);

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
        $show = new Show(Movie::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('director', __('Director'));
        $show->field('describe', __('Describe'));
        $show->field('rate', __('Rate'));
        // $show->field('released', __('Released'));
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
        $form = new Form(new Movie);

        // Displays the record id
        $form->display('id', 'ID');

        // Add an input box of type text
        // $form->text('title', 'Movie title');
        $form->text('title')->placeholder('Please input movie name');
        $form->text('title')->readonly();
        $form->text('title')->autofocus();

        $directors = [
            'John'  => 1,
            'Smith' => 2,
            'Kate'  => 3,
        ];

        $form->select('director', 'Director')->options($directors);

        // Add textarea for the describe field
        $form->textarea('describe', 'Describe');

        // Number input
        $form->number('rate', 'Rate');

        // Add a switch field
        $form->switch('released', 'Released?');

        // Add a date and time selection box
        // $form->dateTime('release_at', 'release time');

        // Display two time column 
        $form->display('created_at', 'Created time');
        $form->display('updated_at', 'Updated time');

        $form->tools(function (Form\Tools $tools) {

            // Disable `List` btn.
            // $tools->disableList();
        
            // Disable `Delete` btn.
            // $tools->disableDelete();
        
            // Disable `Veiw` btn.
            // $tools->disableView();
        
            // Add a button, the argument can be a string, or an instance of the object that implements the Renderable or Htmlable interface
            // $tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
        });

        return $form;
    }
}
