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

	require_once "../easyrdf/lib/EasyRdf.php";
    require_once "../easyrdf/examples/html_tag_helpers.php";

    // Setup prefix
    EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
	EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
	EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');
	EasyRdf_Namespace::set('thk', 'http://dpch.oss.web.id/Bali/TriHitaKarana.owl#');
	EasyRdf_Namespace::set('kamus', 'http://dpch.oss.web.id/Bali/BalineseDictionary.owl#');
	EasyRdf_Namespace::set('lexicog', 'http://www.w3.org/ns/lemon/lexicog#');
	EasyRdf_Namespace::set('lexinfo', 'http://www.lexinfo.net/ontology/3.0/lexinfo#');
	EasyRdf_Namespace::set('dc', 'http://purl.org/dc/elements/1.1/');
	EasyRdf_Namespace::set('lime', 'http://www.w3.org/ns/lemon/lime#');
	EasyRdf_Namespace::set('ontolex', 'http://www.w3.org/ns/lemon/ontolex#');
	EasyRdf_Namespace::set('skos', 'http://www.w3.org/2004/02/skos/core#');

    //Setup update connection to triple store end point
    $kamus_update = new EasyRdf_Sparql_Client('http://kamus.oss.web.id:3030/kamus/update');

    $sparql = new EasyRdf_Sparql_Client('http://localhost:3030/kamus/query');
?>
