<?php


/**
 * Dit is de testclass voor de countries controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\Artikels;


 class artikelsTest extends TestCase
 {
   /**
    * @dataProvider provideSayMyName
    */
    public function testSayMyName($input,$expected)
    {
        $artikels = new Artikels();
        $output = $artikels->sayMyName($input);
        $message = "Er moet uitkomen: 'Mijn naam is: $input'";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }

    public function provideSayMyName()
    {
      return [
         'test1' => ['Ruud', 'Hallo mijn naam is : Ruud'],
         'test2' => ['Leo', 'Hallo mijn naam is : Leo']
      ];
    }
 }