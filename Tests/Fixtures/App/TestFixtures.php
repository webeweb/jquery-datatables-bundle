<?php

/**
 * This file is part of the edm-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\App;

use DateTime;
use WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\Entity\Employee;

/**
 * Test fixtures.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\App
 * @final
 */
final class TestFixtures {

    /**
     * Get the employees.
     *
     * @return Employee[] Returns the employee entities.
     */
    public static function getEmployees() {

        // Initialize the fixtures.
        $fixtures = [];

        $fixtures[] = (new Employee())->setName("Tiger Nixon")->setPosition("System Architect")->setOffice("Edinburgh")->setAge(61)->setStartDate(new DateTime("2011-04-25"))->setSalary(320800);
        $fixtures[] = (new Employee())->setName("Garrett Winters")->setPosition("Accountant")->setOffice("Tokyo")->setAge(63)->setStartDate(new DateTime("2011-07-25"))->setSalary(170750);
        $fixtures[] = (new Employee())->setName("Ashton Cox")->setPosition("Junior Technical Author")->setOffice("San Francisco")->setAge(66)->setStartDate(new DateTime("2009-01-12"))->setSalary(86000);
        $fixtures[] = (new Employee())->setName("Cedric Kelly")->setPosition("Senior Javascript Developer")->setOffice("Edinburgh")->setAge(22)->setStartDate(new DateTime("2012-03-29"))->setSalary(433060);
        $fixtures[] = (new Employee())->setName("Airi Satou")->setPosition("Accountant")->setOffice("Tokyo")->setAge(33)->setStartDate(new DateTime("2008-11-28"))->setSalary(162700);
        $fixtures[] = (new Employee())->setName("Brielle Williamson")->setPosition("Integration Specialist")->setOffice("New York")->setAge(61)->setStartDate(new DateTime("2012-12-02"))->setSalary(372000);
        $fixtures[] = (new Employee())->setName("Herrod Chandler")->setPosition("Sales Assistant")->setOffice("San Francisco")->setAge(59)->setStartDate(new DateTime("2012-08-06"))->setSalary(137500);
        $fixtures[] = (new Employee())->setName("Rhona Davidson")->setPosition("Integration Specialist")->setOffice("Tokyo")->setAge(55)->setStartDate(new DateTime("2010-10-14"))->setSalary(327900);
        $fixtures[] = (new Employee())->setName("Colleen Hurst")->setPosition("Javascript Developer")->setOffice("San Francisco")->setAge(39)->setStartDate(new DateTime("2009-09-15"))->setSalary(205500);
        $fixtures[] = (new Employee())->setName("Sonya Frost")->setPosition("Software Engineer")->setOffice("Edinburgh")->setAge(23)->setStartDate(new DateTime("2008-12-13"))->setSalary(103600);
        $fixtures[] = (new Employee())->setName("Jena Gaines")->setPosition("Office Manager")->setOffice("London")->setAge(30)->setStartDate(new DateTime("2008-12-19"))->setSalary(90560);
        $fixtures[] = (new Employee())->setName("Quinn Flynn")->setPosition("Support Lead")->setOffice("Edinburgh")->setAge(22)->setStartDate(new DateTime("2013-03-03"))->setSalary(342000);
        $fixtures[] = (new Employee())->setName("Charde Marshall")->setPosition("Regional Director")->setOffice("San Francisco")->setAge(36)->setStartDate(new DateTime("2008-10-16"))->setSalary(470600);
        $fixtures[] = (new Employee())->setName("Haley Kennedy")->setPosition("Senior Marketing Designer")->setOffice("London")->setAge(43)->setStartDate(new DateTime("2012-12-18"))->setSalary(313500);
        $fixtures[] = (new Employee())->setName("Tatyana Fitzpatrick")->setPosition("Regional Director")->setOffice("London")->setAge(19)->setStartDate(new DateTime("2010-03-17"))->setSalary(385750);
        $fixtures[] = (new Employee())->setName("Michael Silva")->setPosition("Marketing Designer")->setOffice("London")->setAge(66)->setStartDate(new DateTime("2012-11-27"))->setSalary(198500);
        $fixtures[] = (new Employee())->setName("Paul Byrd")->setPosition("Chief Financial Officer (CFO)")->setOffice("New York")->setAge(64)->setStartDate(new DateTime("2010-06-09"))->setSalary(725000);
        $fixtures[] = (new Employee())->setName("Gloria Little")->setPosition("Systems Administrator")->setOffice("New York")->setAge(59)->setStartDate(new DateTime("2009-04-10"))->setSalary(237500);
        $fixtures[] = (new Employee())->setName("Bradley Greer")->setPosition("Software Engineer")->setOffice("London")->setAge(41)->setStartDate(new DateTime("2012-10-13"))->setSalary(132000);
        $fixtures[] = (new Employee())->setName("Dai Rios")->setPosition("Personnel Lead")->setOffice("Edinburgh")->setAge(35)->setStartDate(new DateTime("2012-09-26"))->setSalary(217500);
        $fixtures[] = (new Employee())->setName("Jenette Caldwell")->setPosition("Development Lead")->setOffice("New York")->setAge(30)->setStartDate(new DateTime("2011-09-03"))->setSalary(345000);
        $fixtures[] = (new Employee())->setName("Yuri Berry")->setPosition("Chief Marketing Officer (CMO)")->setOffice("New York")->setAge(40)->setStartDate(new DateTime("2009-06-25"))->setSalary(675000);
        $fixtures[] = (new Employee())->setName("Caesar Vance")->setPosition("Pre-Sales Support")->setOffice("New York")->setAge(21)->setStartDate(new DateTime("2011-12-12"))->setSalary(106450);
        $fixtures[] = (new Employee())->setName("Doris Wilder")->setPosition("Sales Assistant")->setOffice("Sidney")->setAge(23)->setStartDate(new DateTime("2010-09-20"))->setSalary(85600);
        $fixtures[] = (new Employee())->setName("Angelica Ramos")->setPosition("Chief Executive Officer (CEO)")->setOffice("London")->setAge(47)->setStartDate(new DateTime("2009-10-09"))->setSalary(1200000);
        $fixtures[] = (new Employee())->setName("Gavin Joyce")->setPosition("Developer")->setOffice("Edinburgh")->setAge(42)->setStartDate(new DateTime("2010-12-22"))->setSalary(92575);
        $fixtures[] = (new Employee())->setName("Jennifer Chang")->setPosition("Regional Director")->setOffice("Singapore")->setAge(28)->setStartDate(new DateTime("2010-11-14"))->setSalary(357650);
        $fixtures[] = (new Employee())->setName("Brenden Wagner")->setPosition("Software Engineer")->setOffice("San Francisco")->setAge(28)->setStartDate(new DateTime("2011-06-07"))->setSalary(206850);
        $fixtures[] = (new Employee())->setName("Fiona Green")->setPosition("Chief Operating Officer (COO)")->setOffice("San Francisco")->setAge(48)->setStartDate(new DateTime("2010-03-11"))->setSalary(850000);
        $fixtures[] = (new Employee())->setName("Shou Itou")->setPosition("Regional Marketing")->setOffice("Tokyo")->setAge(20)->setStartDate(new DateTime("2011-08-14"))->setSalary(163000);
        $fixtures[] = (new Employee())->setName("Michelle House")->setPosition("Integration Specialist")->setOffice("Sidney")->setAge(37)->setStartDate(new DateTime("2011-06-02"))->setSalary(95400);
        $fixtures[] = (new Employee())->setName("Suki Burks")->setPosition("Developer")->setOffice("London")->setAge(53)->setStartDate(new DateTime("2009-10-22"))->setSalary(114500);
        $fixtures[] = (new Employee())->setName("Prescott Bartlett")->setPosition("Technical Author")->setOffice("London")->setAge(27)->setStartDate(new DateTime("2011-05-07"))->setSalary(145000);
        $fixtures[] = (new Employee())->setName("Gavin Cortez")->setPosition("Team Leader")->setOffice("San Francisco")->setAge(22)->setStartDate(new DateTime("2008-10-26"))->setSalary(235500);
        $fixtures[] = (new Employee())->setName("Martena Mccray")->setPosition("Post-Sales support")->setOffice("Edinburgh")->setAge(46)->setStartDate(new DateTime("2011-03-09"))->setSalary(324050);
        $fixtures[] = (new Employee())->setName("Unity Butler")->setPosition("Marketing Designer")->setOffice("San Francisco")->setAge(47)->setStartDate(new DateTime("2009-12-09"))->setSalary(85675);
        $fixtures[] = (new Employee())->setName("Howard Hatfield")->setPosition("Office Manager")->setOffice("San Francisco")->setAge(51)->setStartDate(new DateTime("2008-12-16"))->setSalary(164500);
        $fixtures[] = (new Employee())->setName("Hope Fuentes")->setPosition("Secretary")->setOffice("San Francisco")->setAge(41)->setStartDate(new DateTime("2010-02-12"))->setSalary(109850);
        $fixtures[] = (new Employee())->setName("Vivian Harrell")->setPosition("Financial Controller")->setOffice("San Francisco")->setAge(62)->setStartDate(new DateTime("2009-02-14"))->setSalary(452500);
        $fixtures[] = (new Employee())->setName("Timothy Mooney")->setPosition("Office Manager")->setOffice("London")->setAge(37)->setStartDate(new DateTime("2008-12-11"))->setSalary(136200);
        $fixtures[] = (new Employee())->setName("Jackson Bradshaw")->setPosition("Director")->setOffice("New York")->setAge(65)->setStartDate(new DateTime("2008-09-26"))->setSalary(645750);
        $fixtures[] = (new Employee())->setName("Olivia Liang")->setPosition("Support Engineer")->setOffice("Singapore")->setAge(64)->setStartDate(new DateTime("2011-02-03"))->setSalary(234500);
        $fixtures[] = (new Employee())->setName("Bruno Nash")->setPosition("Software Engineer")->setOffice("London")->setAge(38)->setStartDate(new DateTime("2011-05-03"))->setSalary(163500);
        $fixtures[] = (new Employee())->setName("Sakura Yamamoto")->setPosition("Support Engineer")->setOffice("Tokyo")->setAge(37)->setStartDate(new DateTime("2009-08-19"))->setSalary(139575);
        $fixtures[] = (new Employee())->setName("Thor Walton")->setPosition("Developer")->setOffice("New York")->setAge(61)->setStartDate(new DateTime("2013-08-11"))->setSalary(98540);
        $fixtures[] = (new Employee())->setName("Finn Camacho")->setPosition("Support Engineer")->setOffice("San Francisco")->setAge(47)->setStartDate(new DateTime("2009-07-07"))->setSalary(87500);
        $fixtures[] = (new Employee())->setName("Serge Baldwin")->setPosition("Data Coordinator")->setOffice("Singapore")->setAge(64)->setStartDate(new DateTime("2012-04-09"))->setSalary(138575);
        $fixtures[] = (new Employee())->setName("Zenaida Frank")->setPosition("Software Engineer")->setOffice("New York")->setAge(63)->setStartDate(new DateTime("2010-01-04"))->setSalary(125250);
        $fixtures[] = (new Employee())->setName("Zorita Serrano")->setPosition("Software Engineer")->setOffice("San Francisco")->setAge(56)->setStartDate(new DateTime("2012-06-01"))->setSalary(115000);
        $fixtures[] = (new Employee())->setName("Jennifer Acosta")->setPosition("Junior Javascript Developer")->setOffice("Edinburgh")->setAge(43)->setStartDate(new DateTime("2013-02-01"))->setSalary(75650);
        $fixtures[] = (new Employee())->setName("Cara Stevens")->setPosition("Sales Assistant")->setOffice("New York")->setAge(46)->setStartDate(new DateTime("2011-12-06"))->setSalary(145600);
        $fixtures[] = (new Employee())->setName("Hermione Butler")->setPosition("Regional Director")->setOffice("London")->setAge(47)->setStartDate(new DateTime("2011-03-21"))->setSalary(356250);
        $fixtures[] = (new Employee())->setName("Lael Greer")->setPosition("Systems Administrator")->setOffice("London")->setAge(21)->setStartDate(new DateTime("2009-02-27"))->setSalary(103500);
        $fixtures[] = (new Employee())->setName("Jonas Alexander")->setPosition("Developer")->setOffice("San Francisco")->setAge(30)->setStartDate(new DateTime("2010-07-14"))->setSalary(86500);
        $fixtures[] = (new Employee())->setName("Shad Decker")->setPosition("Regional Director")->setOffice("Edinburgh")->setAge(51)->setStartDate(new DateTime("2008-11-13"))->setSalary(183000);
        $fixtures[] = (new Employee())->setName("Michael Bruce")->setPosition("Javascript Developer")->setOffice("Singapore")->setAge(29)->setStartDate(new DateTime("2011-06-27"))->setSalary(183000);
        $fixtures[] = (new Employee())->setName("Donna Snider")->setPosition("Customer Support")->setOffice("New York")->setAge(27)->setStartDate(new DateTime("2011-01-25"))->setSalary(112000);

        // Return the fixtures.
        return $fixtures;
    }

}
