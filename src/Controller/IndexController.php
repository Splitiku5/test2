<?php

namespace Test\Controller;

use Test\Services\ConfigurationService,
    Test\Services\TemplateEngine,
    Test\Validator\Validator,
    Test\Services\CSVService;

class IndexController extends BaseController
{
	public function getAction(): void
    {
        $error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
		$this->render('layout', [
			'title' => ConfigurationService::getConfig('TITLE'),
			'content' => TemplateEngine::view('pages/index', [
                'error' => $error,
            ]),
		]);
	}
    public function postAction(): void
    {
        $error = '';

        if(isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
        {
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $allowedfileExtensions = array('csv');

            if (in_array($fileExtension, $allowedfileExtensions))
            {
                $uploadFileDir = ROOT . '/public/uploads/';
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
            }
            else
            {
                $error = 'Неподходящий формат файла.';
            }
        }
        else
        {
            $error = 'Что-то пошло не так, попоробуйте снова';
        }
        $_SESSION['error'] = $error;
        $_SESSION['path'] = $dest_path;
        header('Location: /success/');
    }
}
