<?php //CPYRGHT
/**
 * api.piratenpartei-bw.de
 * 
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @author  Thomas Heidrich
 * @copyright Copyright (c) 2012 Thomas Heidrich and other authors
 */
?><?php
class WikiElementFixture extends CakeTestFixture {
    
    /**
     * imports the table definition from regular database
     */
    public $import = 'WikiElement';
    
    /**
     * some initial database records
     */
    public $records;
    
    /**
     * Fills up the database records beforehand.
     */
    public function __construct(){
        
        $this->records = array(
            array('id' => 1, 'page_id' => 1, 'element_id' => 'pkn_intro', 'content' => 'Dies ist ein Test.', 'requested' => date('Y-m-d H:00:00', time()), 'updatedat' => date('Y-m-d H:00:00', time()), 'created' => '2007-03-18 10:39:23')
            ,array('id' => 2, 'page_id' => 1, 'element_id' => 'pkn_intro', 'content' => 'Dies ist ein Test.', 'requested' => '2007-03-18 10:39:23', 'updatedat' => '2007-03-18 10:39:23', 'created' => '2007-03-18 10:39:23')
        );
        
        parent::__construct();
    }
 }
 
?>