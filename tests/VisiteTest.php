<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests;

use App\Entity\Visite;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Description of VisiteTest
 *
 * @author thoma
 */
class VisiteTest extends TestCase {
    
    public function testGetDatecreationString() {
        $visite = new Visite();
        $visite->setDatecreation(new DateTime("2021-10-14"));
        $this->assertEquals("14/10/2021", $visite->getDatecreationString());
    }
}
