<?php

namespace Alex\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class PayController
{
    public function index(Request $request, Application $app)
    {
        return $app['twig']->render('index.twig', array());
    }

    public function parseData(Request $request, Application $app)
    {
        $xml = @simplexml_load_file('http://u.travel/testXML.xml');

        if (isset($xml->row)) {
            foreach ($xml->row as $row) {
                $id = $app['modelUser']->addNewUser(strval($row->name), strval($row->surname), strval($row->age));
                if ($id === '') {
                    $id = $app['modelUser']->getUserIdByFullName(strval($row->name), strval($row->surname));
                }
                $app['modelPay']->addPays($id, strval($row->countPays), strval($row->countPays['succsses']), strval($row->countPays['errors']));
            }

        } else {
            return $app->json(["error" => "Can`t read xml from http://u.travel/testXML.xml"], 500);
        }
        return $app->json(["status" => "Data was successful parsed"], 200);
    }

    public function getData(Request $request, Application $app)
    {
        return $app->json($app['modelPay']->getAllDataWithUser());
    }

}