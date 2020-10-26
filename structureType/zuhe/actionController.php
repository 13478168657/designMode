<?php

namespace zuhe;

include_once 'FormElement.php';
include_once 'Form.php';
include_once 'Input.php';
include_once 'Fieldset.php';
class actionController{

    public function index(){


    }

    public function getProductForm()
    {
        $form = new Form('product', "Add product", "/product/add");
        $form->add(new Input('name', "Name", 'text'));
        $form->add(new Input('description', "Description", 'text'));

        $picture = new Fieldset('photo', "Product photo");
        $picture->add(new Input('caption', "Caption", 'text'));
        $picture->add(new Input('image', "Image", 'file'));

        $form->add($picture);
        return $form;
    }

    function loadProductData(FormElement $form)
    {
        $data = [
            'name' => 'Apple MacBook',
            'description' => 'A decent laptop.',
            'photo' => [
                'caption' => 'Front photo.',
                'image' => 'photo1.png',
            ],
        ];

        $form->setData($data);
    }

    function renderProduct(FormElement $form)
    {
        echo $form->render();

    }
}
$action = new actionController();

$form = $action->getProductForm();

//print_r($form);
$action->loadProductData($form);
$action->renderProduct($form);
