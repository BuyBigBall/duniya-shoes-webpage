<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ColorsGroup;
use App\Models\Type;
use App\Models\Back;
use App\Models\Sole;
use App\Models\ModelSerial;
use App\Models\Accessory;
use App\Models\Lining;
use App\Models\Lace;
use App\Models\Color;
use File;

class ModelCreateController
{
    public static function createNewModelImages($newModel, $base64_img)
    {
        ini_set('max_execution_time', 1200);
        $new_model_no   = $newModel->modelno;

        #1. creating list page image
        $imgpath = "\\images\\models\\iShoes\\designershoes\\modelStyles\\" . $new_model_no . ".jpg";
        $path = public_path();
        $img_src_content = str_replace('data:image/png;base64,','', $base64_img);
        $data   = base64_decode($img_src_content);
        $file1  = $path.$imgpath;
        $success = file_put_contents($file1, $data);
        
        
        #2. creating model image Folders
        $Main_Model_Dir = public_path() . "\\images\\models\\iShoes\\designershoes\\" . $new_model_no;
        $Mase_Image_Dir = public_path() . "\\images\\MainBody";
        if(!File::exists($Main_Model_Dir)) {
            // path does not exist
            File::makeDirectory($Main_Model_Dir);
            File::makeDirectory($Main_Model_Dir . "\\view");
            File::makeDirectory($Main_Model_Dir . "\\view1");
            File::makeDirectory($Main_Model_Dir . "\\view2");
            File::makeDirectory($Main_Model_Dir . "\\view3");
            file_put_contents($Main_Model_Dir . "\\view1\\Body.png", $data);
            file_put_contents($Main_Model_Dir . "\\view2\\Body.png", $data);
        }
        
        #3. creating detail page basic images
        $srcFile = $Mase_Image_Dir."\\samples\\view1.jpg";
        File::copy($srcFile, $Main_Model_Dir . '\\view\\view1.jpg');
        $srcFile = $Mase_Image_Dir."\\samples\\view2.jpg";
        File::copy($srcFile, $Main_Model_Dir . '\\view\\view2.jpg');
        $srcFile = $Mase_Image_Dir."\\samples\\view3.jpg";
        File::copy($srcFile, $Main_Model_Dir . '\\view\\view3.jpg');
        $srcFile = $Mase_Image_Dir."\\samples\\bg_m.jpg";
        File::copy($srcFile, $Main_Model_Dir . '\\background.jpg');

        #4. creating detail page special images
        //return;
        ModelCreateController::createMainImages($newModel, $Main_Model_Dir);
        ModelCreateController::createBackImages($newModel, $Main_Model_Dir);
        ModelCreateController::createFrontImages($newModel, $Main_Model_Dir);
        ModelCreateController::createSideImages($newModel, $Main_Model_Dir);
        ModelCreateController::createLaceImages($newModel, $Main_Model_Dir);
        ModelCreateController::createLiningImages($newModel, $Main_Model_Dir);
        ModelCreateController::createSoleImages($newModel, $Main_Model_Dir);
        ModelCreateController::createAccessoryImages($newModel, $Main_Model_Dir);

    }


    private static function createAccessoryImages($newModel, $Main_Model_Dir)
    {
        $viewFolder = 'Right';  // ?? Left
        //dd($newModel);
        if( !empty( $newModel->accessory ) )
        {
            $mainFolder = $Main_Model_Dir.'\\view1\\accessory';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }

            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\"
                        . ucfirst($newModel->shape);
            $_colors = Accessory::get();
            
            foreach($_colors as $item)
            {
                $srcFile = $srcPath . '\\MainMix\\'.$viewFolder.'\\Accessory\\' . $item->path . '.png';
                if( file_exists($srcFile) )
                {
                    File::copy($srcFile, $mainFolder . "\\" . $item->path . '.png');
                }
            }
            
        }
        return true;    
    }

    private static function createSoleImages($newModel, $Main_Model_Dir)
    {
        $viewFolder = 'Right';  // ?? Left

        if( !empty( $newModel->sole ) )
        {
            # View1 Folder
            $mainFolder = $Main_Model_Dir.'\\view1\\sole';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }
            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\"
                        . ucfirst($newModel->shape);
            $_colors = Sole::get();
            foreach($_colors as $item)
            {
                $srcFile = public_path() . "\\images\\MainBody\\samples\\Sole\\". $newModel->shape."\\". $item->path . ".png";
                if( file_exists($srcFile) )
                {
                    File::copy($srcFile, $mainFolder . "\\" . $item->path . '.png');
                }
            }

            # View3 Folder
            $mainFolder = $Main_Model_Dir.'\\view3\\sole';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }
            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\Sole\\"
                        . ucfirst($newModel->shape);
            $_colors = Sole::get();
            foreach($_colors as $item)
            {
                $srcFile = $srcPath . '\\MainMix\\'.$viewFolder.'\\Sole\\' . $item->path . '.png';
                
                if( file_exists($srcFile) )
                {
                    File::copy($srcFile, $mainFolder . "\\" . $item->path . '.png');
                }
            }            
            
        }
        return true;    
    }
    private static function createLaceImages($newModel, $Main_Model_Dir)
    {
        $viewFolder = 'Right';  // ?? Left

        if( !empty( $newModel->lining ) )
        {
            $mainFolder = $Main_Model_Dir.'\\view1\\laces';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }

            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\"
                        . ucfirst($newModel->shape);
            $_colors = Lace::get();
            foreach($_colors as $item)
            {
                $srcFile = $srcPath . '\\MainMix\\'.$viewFolder.'\\ShoesLace\\' . $item->name . '.png';
                if( file_exists($srcFile) )
                {
                    File::copy($srcFile, $mainFolder . "\\" . $item->name . '.png');
                }
        
            }
            
        }
        return true;    
    }

    private static function createLiningImages($newModel, $Main_Model_Dir)
    {
        $viewFolder = 'Right';  // ?? Left

        if( !empty( $newModel->lining ) )
        {
            $mainFolder = $Main_Model_Dir.'\\view1\\lining';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }

            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\"
                        . ucfirst($newModel->shape);
            $_colors = Lining::get();
            foreach($_colors as $item)
            {
                $srcFile = $srcPath . '\\MainMix\\'.$viewFolder.'\\Lining\\' . $item->name . '.png';
                if( !file_exists($srcFile) )
                {
                    File::copy($srcFile, $mainFolder . "\\" . $item->name . '.png');
                }
        
            }
            
        }
        return true;    
    }
    private static function createFrontImages($newModel, $Main_Model_Dir)
    {
        $viewFolder = 'Right';  // ?? Left

        if( !empty( $newModel->front_color ) )
        {
            $mainFolder = $Main_Model_Dir.'\\view1\\front';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }

            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\"
                        . ucfirst($newModel->shape);
            $_colors = Color::where('leather_id', $newModel->main)->get();
            foreach($_colors as $item)
            {
                $group = 'FT' . $newModel->front; //~ BK9

                $srcFile = $srcPath . '\\MainMix\\'.$viewFolder.'\\Front\\'. $group."\\" .$item->key . '.png';
                if( !file_exists($srcFile) )
                {
                    $srcFile1 = setting('site.original_path') 
                                . '/' . StyleFolder($newModel->style)
                                . '/' . ucfirst($newModel->style)
                                . '/' . $viewFolder
                                . '/Front/'. $group.'/' .$item->key . '.png';
                        if( does_url_exists($srcFile1) ) 
                        {
                            $srcFile = $srcFile1;
                            File::copy($srcFile, $mainFolder . "\\" . $item->key . '.png');
                        }
                }
                else
                    File::copy($srcFile, $mainFolder . "\\" . $item->key . '.png');
        
            }
            
        }
        return true;       

    }

    private static function createSideImages($newModel, $Main_Model_Dir)
    {
        $viewFolder = 'Right';  // ?? Left

        if( !empty( $newModel->side_color ) )
        {
            $mainFolder = $Main_Model_Dir.'\\view1\\side';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }

            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\"
                        . ucfirst($newModel->shape);
            $_colors = Color::where('leather_id', $newModel->main)->get();
            foreach($_colors as $item)
            {
                $group = 'SD' . $newModel->side; //~ BK9

                $srcFile = $srcPath . '\\MainMix\\'.$viewFolder.'\\Side\\'. $group."\\" .$item->key . '.png';
                if( !file_exists($srcFile) )
                {
                    $srcFile1 = setting('site.original_path') 
                                . '/' . StyleFolder($newModel->style)
                                . '/' . ucfirst($newModel->style)
                                . '/' . $viewFolder
                                . '/Side/'. $group.'/' .$item->key . '.png';
                        if( does_url_exists($srcFile1) ) 
                        {
                            $srcFile = $srcFile1;
                            File::copy($srcFile, $mainFolder . "\\" . $item->key . '.png');
                        }
                }
                else
                    File::copy($srcFile, $mainFolder . "\\" . $item->key . '.png');
            }
            
        }
        return true;

    }

    private static function createBackImages($newModel, $Main_Model_Dir)
    {
        $viewFolder = 'Right';  // ?? Left

        if( !empty( $newModel->back_color ) )
        {
            $mainFolder = $Main_Model_Dir.'\\view1\\back';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }

            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\"
                        . ucfirst($newModel->shape);
            $_colors = Color::where('leather_id', $newModel->main)->get();
            foreach($_colors as $item)
            {
                $group = 'BK' . $newModel->back; //~ BK9

                $srcFile = $srcPath . '\\MainMix\\'.$viewFolder.'\\Back\\'. $group."\\" .$item->key . '.png';
                if( !file_exists($srcFile) )
                {
                    $srcFile1 = setting('site.original_path') 
                                . '/' . StyleFolder($newModel->style)
                                . '/' . ucfirst($newModel->style)
                                . '/' . $viewFolder
                                . '/Back/'. $group.'/' .$item->key . '.png';
                        if( does_url_exists($srcFile1) ) 
                        {
                            $srcFile = $srcFile1;
                            File::copy($srcFile, $mainFolder . "\\" . $item->key . '.png');
                        }
                }
                else
                    File::copy($srcFile, $mainFolder . "\\" . $item->key . '.png');
            }
            
        }
        return true;
    }
    private static function createMainImages($newModel, $Main_Model_Dir)
    {
        $viewFolder = 'Right';  // ?? Left

        if( !empty( $newModel->main_color ) )
        {
            $mainFolder = $Main_Model_Dir.'\\view1\\main';
            if( !File::exists( $mainFolder ))
            {
                File::makeDirectory($mainFolder);
            }

            $srcPath = public_path() . "\\images\\MainBody\\" 
                        . StyleFolder($newModel->style) . "\\"
                        . ucfirst($newModel->shape);
            $_colors = Color::where('leather_id', $newModel->main)->get();
            //dd($_colors);
            foreach($_colors as $item)
            {
                $srcFile = $srcPath . "\\".$viewFolder."\\" .$item->key . '.png';

                //var_dump($srcFile);
                if( !file_exists($srcFile) )
                {
                    $srcFile1 = setting('site.original_path') 
                                . '/' . StyleFolder($newModel->style)
                                . '/' . ucfirst($newModel->style)
                                . '/' . $viewFolder
                                . '/' . $item->key . '.png';
                        if( does_url_exists($srcFile1) ) 
                        {
                            $srcFile = $srcFile1;
                            File::copy($srcFile, $mainFolder . "\\" . $item->key . '.png');
                        }
                }
                else
                    File::copy($srcFile, $mainFolder . "\\" . $item->key . '.png');
            }
            
        }
        return true;
    }

}
