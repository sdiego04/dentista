<?php


/**
 * @package Dentista
 * @version 0.0.1
 * @author Diego Silva <s.diego04@gmail.co,>
 * @copyright 2023-2024 by Diego Silva, all rights reserved.
 */

/*----- BEGIN SQL ------*/
define('DESC', 1);
define('ASC', 0);
define('CREATE', 'create');
define('READ', 'read');
define('UPDATE', 'update');
define('DELETE', 'delete');
/*------ END SQL--------*/


/*------ BEGIN TYPE PERSON ------*/
define('LEGAL_PERSON', '2');
define('NATURAL_PERSON', '1');
/*------ END TYPE PERSON ------*/


/*----- BEGIN STATUS CODES -----*/
define('STATUS_ACTIVE', 1);
define('STATUS_INATIVE', 0);
define('STATUS_DELETE', 2);
/*---- END STATUS CODES -------*/