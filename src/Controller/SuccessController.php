<?php

namespace Test\Controller;

use Test\Services\ConfigurationService,
    Test\Services\TemplateEngine;
use Test\Services\CSVService;

class SuccessController extends BaseController
{
    public function getAction(): void
    {
        if(!$_SESSION['path'])
        {
            header('Location: /');
        }
        $path =  $_SESSION['path'];
        $content = CSVService::CSVfileToArray($path);
        $this->render('layout', [
            'title' => ConfigurationService::getConfig('TITLE'),
            'content' => TemplateEngine::view('pages/success', [
                'content' => $content,
            ]),
        ]);
    }
}