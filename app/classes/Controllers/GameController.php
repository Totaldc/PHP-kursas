<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Pixels\Game;
use App\Views\Forms\AddForm;
use App\Views\Forms\PixelAddForm;
use App\Views\Forms\PlayForm;
use Core\Router;
use Core\Views\Content;
use Core\Views\Form;

class GameController extends Controller
{

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new PixelsController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ProductsController();
     * print $controller->my();
     *
     * @return string|null
     */
    public function index(): ?string
    {
        //kintamasis $games pixelių masyvo duomenis iš db.json
        $games = App::$db->getRowsWhere('pixels', []);

        //sukuriamas naujas objektas, kurio pagalba gaunamas pixels masyvas (per View klasę), paduodamas $template_path???
        $content = new Content($games);

        //nurodomas page Title
        $this->page->setTitle('All Pixels');

        //nustatomas html content, paduodamas pixelių masyvas renderiui, kuris jau aprašytas index.tpl.php
        $this->page->setContent($content->render('pixels/index.tpl.php'));

        //išprintinamas visas puslapis
        return $this->page->render();
    }

    public function game(): ?string
    {
        $form = new AddForm();

        if (!App::$session->getUser()) {
            header('Location:' . Router::getUrl('login'));
            exit;
        }
        $game = new Game($form->getSubmitData());
        $userRows = App::$db->getRowsWhere('accounts', ['email' => $_SESSION['email']]);
        // foreach($userRows as $key => $row){
        //     if($row['balansas']){
        //         App::$db->insertRow('accounts', ['balansas' => 0], $key)
        //     }
        // }
        // rowExists
        // var_dump($userRows);
        if ($form->isSubmitted()) {
            if ($form->validate()) {
                foreach ($userRows as $key => $row) {

                    if ($form->getSubmitAction() === 'submit') {

                        $income = (int) $_POST['balansas'] + (int) $row['balansas'];
                        App::$db->updateRow('accounts', $key, ['balansas' => $income, 'email' => $_SESSION['email']]);
                        // var_dump($_POST['balansas']);

                    } elseif ($form->getSubmitAction() === 'submit2') {

                        $income = (int) $row['balansas'] - (int) $_POST['balansas'];
                        if ($income > 0) {
                            App::$db->updateRow('accounts', $key, ['balansas' => $income, 'email' => $_SESSION['email']]);
                        }
                    }
                }
            }
        }

        $content = new Content(['form' => $form->render(), 'error' => $error ?? null]);

        $this->page->setTitle('Add cash');
        $this->page->setContent($content->render('addCash.tpl.php'));
        return $this->page->render();
    }

    public function play()
    {

		$form = new PlayForm();
		
		$images = [0, 0, 0, 0, 0, 0, 0, 0, 0];

        if (!App::$session->getUser()) {
            header('Location:' . Router::getUrl('login'));
            exit;
        }
        $game = new Game($form->getSubmitData());
        $userRows = App::$db->getRowsWhere('accounts', ['email' => $_SESSION['email']]);
        var_dump($userRows);
        if ($form->isSubmitted()) {
            if ($form->validate()) {
                foreach ($userRows as $key => $row) {

                    if ($form->getSubmitAction() === 'submit2') {
						$income = (int) $row['balansas'] - (int) $_POST['balansas'];
						
						foreach($images as &$image){
							$image = rand(1, 3);
							var_dump($image);
						}

						if($images[3] === $images[4] && $images[3] === $images[5]){
							$income = (int) $row['balansas'] + ((int) $_POST['balansas'] *  3);
						}

                        if ($income > 0) {
                            App::$db->updateRow('accounts', $key, ['balansas' => $income, 'email' => $_SESSION['email']]);
                        }
                    }
                }
            }
        }

        $content = new Content(['form' => $form->render(),'images' => $images , 'error' => $error ?? null]);

        $this->page->setTitle('Play a game');
        $this->page->setContent($content->render('play.tpl.php'));
        return $this->page->render();

    }
}
