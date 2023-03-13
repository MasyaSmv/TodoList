<?php

namespace App\Controllers;

use App\App\App;
use App\Models\Work;
use Exception;

class WorkController
{
    protected $table;

    /**
     *
     */
    public function __construct()
    {
        $work = new Work();
        $this->table = 'works';
    }

    /**
     * @return null
     */
    public function index()
    {
        $works = App::get('DB')->all($this->table, Work::class, 'order by id desc');
        $title = 'Список задач';

        return view('works.index', compact('works', 'title'));
    }

    /**
     * @return null
     */
    public function create()
    {
        $title = 'Создание задачи';

        return view('works.create', compact('title'));
    }

    /**
     * @return void|null
     */
    public function store()
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['description']))
        {
            $params = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'description' => $_POST['description'],
                'create_at' => date("Y-m-d H:i:s"),
                'update_at' => date("Y-m-d H:i:s"),
            ];

            try {
                App::get('DB')->insert($this->table, $params);
            } catch (Exception $e) {
                require "views/500.php";
            }

            return redirect('works');
        }

        require "views/500.php";
    }

    /**
     * @return void|null
     */
    public function edit()
    {
        list($work, $id) = checkIdWork($this->table);

        $title = $work->name . ' | Редактирование задачи';

        return view('works.update', compact('work', 'title'));
    }

    /**
     * @return void|null
     */
    public function update()
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['description']))
        {
            list($work, $id) = checkIdWork($this->table);

            if ($work->name != $_POST['name'] || $work->description != $_POST['description'] || $work->email != $_POST['email'])
            {
                $params = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'description' => $_POST['description'],
                    'update_at' => date("Y-m-d H:i:s"),
                ];

                try {
                    App::get('DB')->update($this->table, $params, $id);
                } catch (Exception $e) {
                    require "./../views/500.php";
                }

                return redirect('works');
            }
        }

        require "./../views/500.php";
    }

    /**
     * @return null
     */
    public function delete()
    {
        if (!isset($_GET['id'])) {
            require "views/404.php";
        }

        $id = trim(strip_tags($_GET['id']));

        $work = App::get('DB')->first($this->table, Work::class, $id);

        if (!empty($work)) {
            App::get('DB')->delete($this->table, $id);
        }

        return redirect('works');
    }
}