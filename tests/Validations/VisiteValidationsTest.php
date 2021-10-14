<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests\Validations;

use App\Entity\Visite;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Description of VisiteValidationsTest
 *
 * @author thoma
 */
class VisiteValidationsTest extends KernelTestCase {
    
    public function getVisite(): Visite{
        return (new Visite())
                ->setVille("NewYork")
                ->setPays("USA");
    }
    
    public function testValidNoteVisite(){
        $visite = $this->getVisite()->setNote(10);
        $this->assertErrors($visite, 0);
    }
    
    public function testNonValidNoteVisite(){
        $visite = $this->getVisite()->setNote(21);
        $this->assertErrors($visite, 1, "note=21 devrai échouer");
    }
    
    public function testNonValidTempmaxVisite() {
        $visite = $this->getVisite()
                ->setTempmin(20)
                ->setTempmax(18);
        $this->assertErrors($visite, 1, "min=20, max=18 devrait échouer");
    }
    
    public function assertErrors(Visite $visite, int $nbErreursAttendues, string $message="") {
        self::bootKernel();
        $error = self::$container->get('validator')->validate($visite);
        $this->assertCount($nbErreursAttendues, $error, $message);
    }
    
}
