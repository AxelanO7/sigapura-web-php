<?php
     /** 
     *
     * This code will insert a location into thk ontology
     * The input base on a file ../forms/form_location.html
     * 
     * @package    	Input
     * @copyright  	Copyright (c) 2016 Cokorda Pramartha
     * @developer	cokorda@oss.web.id
     * @license    	GNU
     */

	require_once "easyrdf/lib/EasyRdf.php";
    require_once "easyrdf/examples/html_tag_helpers.php";

    // Setup prefix
    EasyRdf_Namespace::set ('rdf' , 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
    EasyRdf_Namespace::set ('owl' , 'http://www.w3.org/2002/07/owl#');
    EasyRdf_Namespace::set ('rdfs' , 'http://www.w3.org/2000/01/rdf-schema#');
    EasyRdf_Namespace::set ('kamus' ,  'http://dpch.oss.web.id/Bali/BalineseDictionary.owl#');
    EasyRdf_Namespace::set ('vcard' , 'http://www.w3.org/2006/vcard/ns#');
    
    //Setup update connection to triple store end point
    $thk_update = new EasyRdf_Sparql_Client('http://kamus.oss.web.id:3030/kamus/update');
?>
