<?php
/**
 * Website content caching
 *
 * This file [reads, caches, delivers] content from other websites.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Website content caching controller
 */
class WikiController extends AppController{
    
    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Wiki';
    
    /**
     * Helpers in use
     * @var array
     */
    public $helpers = array('Html');
    
    /**
     * Models in use
     * @var array
     */
    public $uses = array('WikiPage', 'WikiElement');
    
    // ############## PUBLICLY ACCESSIBLE METHODS ################
    /**
     * Displays a static manual page
     */
    public function index(){
        $this->layout = 'default-trans';
        // see /app/View/Wiki/index.ctp
    }
    
    /**
     * Displays a short database summary
     */
    public function statistik(){
        $pageCount = $this->WikiPage->find('count');
        $elementCount = $this->WikiElement->find('count');
        $wikiPages = $this->WikiPage->find('all'
            , array('recursive' => 1
                    ,'fields' => array('WikiPage.title', 'WikiPage.updatedat', 'WikiPage.requested')
            )
        );
        
        $this->set('page_count', $pageCount);
        $this->set('element_count', $elementCount);
        $this->set('wiki_pages', $wikiPages);
    }
    
    /**
     * Delivers a page element extracted from another website.
     * The extracted content will be delivered without the bloaty
     * HTML stuff around it.
     */
    public function getpagejson(){
        $this->layout = 'ajax';
        $this->view = 'getjson';
        $content = ':(';
    
        $params = $this->parseGetParamsWithId($this->params);
        if(!empty($params)){
            extract($params);
    
            // lookup the WikiPage or fetch it
            $wikiPage = $this->WikiPage->getPage($title);
            if(!empty($wikiPage)){
                // prepare the WikiElement for being delivered
                $content = $wikiPage['WikiPage']['content'];
            }else{
                $content .= ' Das Element mit der ID "'
                .$elementId
                .'" wurde innerhalb der Wikiseite nicht gefunden.'
                ;
            }
        }else{
            $content = 'Der Aufruf schlug aufgrund fehlerhafter Eingaben fehl.';
        }
        $this->set('element_id', $elementId);
        $this->set('content', $content);
    }
    
    /**
     * Delivers a page element extracted from another website.
     * The extracted content will be delivered without the bloaty
     * HTML stuff around it.
     */
    public function get(){
        $this->layout = 'ajax';
        $content = ':(';
        
        $params = $this->parseGetParamsWithId($this->params);
        if(!empty($params)){
            extract($params);
            
            // lookup the WikiPage or fetch it
            $wikiElement = $this->WikiElement->getElement($title, $elementId);
            if(!empty($wikiElement)){
                // prepare the WikiElement for being delivered 
                $content = $wikiElement['WikiElement']['content'];
            }else{
                $content .= ' Das Element mit der ID "'
                    .$elementId
                    .'" wurde innerhalb der Wikiseite nicht gefunden.'
                ;
            }
        }else{
            $content = 'Der Aufruf schlug aufgrund fehlerhafter Eingaben fehl.';
        }
        $this->set('content', $content);
    }
    
    /**
     * Delivers a page from another website without the bloaty
     * HTML stuff around it.
     */
    public function getpage(){
        $this->layout = 'ajax';
        $this->view = 'get';
        $content = ':(';
        
        $title = $this->parseGetParams($this->params);
        if(!empty($title)){
            
            // lookup the WikiPage
            $wikipage = $this->WikiPage->getPage($title);
            if(empty($wikipage['WikiPage'])){
                $content = 'Die Wikiseite '.$title.' wurde nicht gefunden. :(';
            }else{
                $content = $wikipage['WikiPage']['content'];
            }
        }else{
            $content = 'Der Aufruf schlug aufgrund fehlerhafter Eingaben fehl.';
        }
        $this->set('content', $content);
    }
    
    /**
     * Delivers a page of another website.
     * The extracted content will be delivered within a bare HTML
     * page.
     */
    public function getpagehtml(){
        $this->getpage();
        $this->layout = 'barebone';
        $this->view = 'get';
    }
    
    /**
     * Delivers a page element extracted from another website.
     * The extracted content will be delivered within a bare HTML
     * page.
     */
    public function gethtml(){
        $this->get();
        $this->layout = 'barebone';
        $this->view = 'get';
    }
    
    // ############## CONVENIENCE METHODS ################
    /**
     * Parses a client request and extracts title and element-id.
     * http://url.tld/CONTROLLER/ACTION/TITLE_WITH_SLASHES/ELEMENT_ID
     * @param Object $paramsObject The object "params" of the client request.
     *     (usually $this->params)
     * @return array The extracted title and elementId or false if something
     *     bad happened.
     */
    protected function parseGetParamsWithId($paramsObject){
        $retval = false;
        
        if(!empty($paramsObject)){
            // extract title and id of the requested wiki page
            $replaceUrl = $paramsObject->params['controller']
                .'/'
                .$paramsObject->params['action']
                .'/'
            ;
            
            $url = substr($this->params->url, strlen($replaceUrl));
            $dividerPos = strrpos($url, '/');
            
            $title = substr($url, 0, $dividerPos);
            $elementId = substr($url, $dividerPos + 1);
            
            if(!empty($title)
                && !empty($elementId)){
                
                $retval = compact(
                    $title
                    , $elementId
                    , array('title', 'elementId')
                );
            }
        }
        
        return $retval;
    }
    
    /**
     * Parses a client request and extracts title
     * http://url.tld/CONTROLLER/ACTION/TITLE_WITH_SLASHES
     * @param Object $paramsObject The object "params" of the client request.
     *     (usually $this->params)
     * @return string The extracted page title and false if sth. bad happened.
     */
    protected function parseGetParams($paramsObject){
        $retval = false;
        
        if(!empty($paramsObject)){
            // extract title and id of the requested wiki page
            $replaceUrl = $paramsObject->params['controller']
                .'/'
                .$paramsObject->params['action']
                .'/'
            ;
            $url = substr($this->params->url, strlen($replaceUrl));
            
            if(!empty($url)){
                $retval = $url;
            }
        }
        
        return $retval;
    }
}
