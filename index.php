<?php
session_start();
try {
    require('controller/Frontend.php');
    require('controller/Backend.php');
    require('Helper.php');

    $helper = new Helper();
    $getVar = $helper->getGetValues();
    $postVar = $helper->getPostValues();

    include('routerConfig.php');
    $controlerList = ['frontend', 'backend'];

    for ($i = 0; $i<= 2; $i++) {
        if ($i === 2) {
            $controler = new Frontend();
            $controler->homePage();
            break;
        }

        foreach ($routerConfig[$controlerList[$i]] as $action => $actionParameters) {
            if($getVar['action'] === $action) {
                if ($i === 0) {
                    $controler = new Frontend();
                } else {
                    $controler = new Backend();
                }

                $parameters = [];

                if(isset($actionParameters['_GetKey'])){
                    if(isset($getVar[$actionParameters['_GetKey']])) {
                        $parameters[] = $getVar[$actionParameters['_GetKey']];
                    } else {
                        throw new exception($actionParameters['_GetKey'] . 'doesn\'t exist for the action : ' . $action);
                    }
                }

                if(isset($actionParameters['_PostKeys'])) {
                    foreach ($actionParameters['_PostKeys'] as $postKeys) {
                        if (isset($postVar[$postKeys])) {
                            $parameters[] = $postVar[$postKeys];
                        } else {
                            throw new exception($postKeys . 'doesn\'t exist for the action : ' . $action);
                        }
                    }
                }

                $controler->$actionParameters['method'](...$parameters);
                break 2;
            }
        }
    }
} catch(Execption $e) {
    die('ERROR : ' . $e->getMessage());
}
