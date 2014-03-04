<?php
////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * AMPLE Scaffolder Override Configuration File
 *
 * This configuration file is used to override the default form field selectors normally 
 * available under the tabs within the AMPLE Scaffolder web page. This is designed to lock
 * down the more critical settings if required so that end users of the web interface 
 * cannot perform actions that are detrimental to the database or web server on which the
 * AMPLE Scaffolder utility resides.
 * 
 * For the settings within this file to take effect you must set the ENABLE_OVERRIDES constant
 * to a value of TRUE. The ENABLE_OVERRIDES option makes it quick and painless to enable or disable
 * all of the override values within this file. Once enabled, individually defined constants
 * will take effect as long as they have a value other than NULL. Setting a constant below to a 
 * value of NULL will prevent that constant from overriding the default web interface value.
 *
 * For security reasons, in order for this override file to be effective, it must be placed
 * in a directory where the end users do not have the ability to modify its contents. The same
 * goes for the main AMPLE Scaffolder index.php file. If the end users have unrestricted access
 * to either of these files, they can simply make changes to the code behind the scenes, 
 * effectively removing any override settings.
 *
 * 
 * @package		AMPLE Scaffolder Database Utility Package
 * @author		Jeff Todnem 
 * @copyright	Copyright (C) 2006 - 2013 Step41 Software, LLC. All rights reserved. 
 * @license		GNU General Public License version 3 or later
 * @link		http://www.amplescaffolder.com
 */

////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Boolean value used to enable or disable ALL of the definitions that follow within this 
	 * file. Setting this value to FALSE means that none of the additional values below will
	 * take effect, regardless of the values assigned to these additional definitions.
	 * Default Web Interface Value Assigned: NULL
	 *
	 * @var 		boolean
	 * @example		TRUE (overrides for field selectors under tabs with values assigned below)
	 * @example		FALSE (allows values to be set through web interface)
	 * @since  		2.1.8
	 */
	define('ENABLE_OVERRIDES', FALSE);
	
	/**
	 * The override server name that houses the MySQL server instance. Can be either "localhost"
	 * or you can use a fully qualified domain name (FQDN) to reference remote server locations.
	 * Default Web Interface Value Assigned: NULL
	 *
	 * @var 		string
	 * @example		localhost
	 * @example		myserver.mydomain.org
	 * @since  		2.1.8
	 */
	define('QSRV', NULL);
	
	/**
	 * The username that will be used to attach to the MySQL database server instance. This user
	 * must exist within the database itself and requires the proper credentials and access levels
	 * to ensure a successful connection.
	 * Default Web Interface Value Assigned: NULL
	 *
	 * @var 		string
	 * @example		joesmithington
	 * @since  		2.1.8
	 */
	define('QUSR', NULL);
	
	/**
	 * The password that will be used to attach to the MySQL database server instance.
	 * Default Web Interface Value Assigned: NULL
	 *
	 * @var 		string
	 * @example		mypassword
	 * @since  		2.1.8
	 */
	define('QPWD', NULL);
	
	/**
	 * The lookup flag term that will be used to designate a lookup field for tables that are
	 * bound in a relationship that enforces referential integrity.
	 * Default Web Interface Value Assigned: scaffold
	 *
	 * @var 		string
	 * @example		mylookupfield
	 * @since  		2.1.8
	 */
	define('QLUF', NULL);
	
	/**
	 * The name of a valid MySQL database to which the end users should attach. At this time
	 * only one database name is supported within the override file.
	 * Default Web Interface Value Assigned: NULL
	 *
	 * @var 		string
	 * @example		mynewdatabase
	 * @since  		2.1.8
	 */
	define('QDB', NULL);
	
	/**
	 * The name of a valid table within the assigned or selected MySQL database. At this time
	 * only one table name is supported within the override file.
	 * Default Web Interface Value Assigned: NULL
	 *
	 * @var 		string
	 * @example		mytablename
	 * @since  		2.1.8
	 */
	define('QTBL', NULL);
	
	/**
	 * A fixed number of records to display on output per page. 
	 * Default Web Interface Value Assigned: 10
	 *
	 * @var 		int
	 * @example		25 (Will retrieve and display up to 25 records per page)
	 * @example		100 (Will retrieve and display up to 100 records per page)
	 * @since  		2.1.8
	 */
	define('QPP', NULL);
	
	/**
	 * File size limitation - limit total size of file being uploaded to 'n' number of bytes. DEFAULT
	 * Default Web Interface Value Assigned: Varies based on PHP settings on web server
	 *
	 * @var 		int
	 * @example		3145728 (Equals a limit of 3 megabytes) 
	 * @example		10485760 (Equals a limit of 10 megabytes) 
	 * @since  		2.1.8
	 */
	define('QFSIZ', NULL);

	/**
	 * File length limitation - limit total length of file name to 'n' number of characters
	 * Default Web Interface Value Assigned: Varies based on specific database settings assigned.
	 *
	 * @var 		int
	 * @example		100 (Ensures file name will fit into varchar field with 100 character limit) 
	 * @example		250 (Ensures file name will fit into varchar field with 250 character limit) 
	 * @since  		2.1.8
	 */
	define('QFLEN', NULL);	

	/**
	 * Boolean for enabling / disabling a message when new software updates are available
	 * Default Web Interface Value Assigned: FALSE
	 *
	 * @var 		boolean
	 * @example		TRUE (messages visible when updates available)
	 * @example		FALSE (update requests are disabled)
	 * @since  		2.1.8
	 */
	define('QUPD', NULL);

	/**
	 * Boolean for enabling / disabling the syntactic display of SQL queries
	 * Default Web Interface Value Assigned: FALSE
	 *
	 * @var 		boolean
	 * @example		TRUE (all queries are visible)
	 * @example		FALSE (queries are not displayed)
	 * @since  		2.1.8
	 */
	define('QDQ', NULL);

	/**
	 * Boolean for enabling / disabling minimized data display during SQL select output
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (record output is shown in minimized rows by default)
	 * @example		FALSE (record output rows are fully expanded to accommodate the data within)
	 * @since  		2.1.8
	 */
	define('QMDD', NULL);

	/**
	 * Boolean for enabling / disabling records display after a POST 
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (Selected records are displayed in a table above tabbed interface)
	 * @example		FALSE (Only the tabbed interface is visible. No records are displayed.)
	 * @since  		2.1.8
	 */
	define('QPAS', NULL);

	/**
	 * Boolean for enabling / disabling the Bulk Insert feature
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (Bulk Insert is Enabled)
	 * @example		FALSE (Bulk Insert is Disabled)
	 * @since  		2.1.8
	 */
	define('QBIN', NULL);

	/**
	 * Boolean for enabling / disabling HTML tags within form fields
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (HTML tags are allowed within form fields and reamin intact upon submission)
	 * @example		FALSE (HTML tags are stripped from any data submitted to the database)
	 * @since  		2.1.8
	 */
	define('QHTM', NULL);

	/**
	 * Boolean for enabling / disabling SQL syntax highlighting. This functionality has been known
	 * to be somewhat resource intensive depending on the amount of data being displayed in the records 
	 * table. We are currently limiting the highlighting to fields of 255 characters or less to help
	 * with the performance since applying this to text fields was way too resource intensive. Overall,
	 * we still recommend leaving this option disabled unless absolutely necessary.
	 * Default Web Interface Value Assigned: FALSE
	 *
	 * @var 		boolean
	 * @example		TRUE (Displays SQL using term-specific color coding for easier identification of key terms)
	 * @example		FALSE (Disables all SQL syntax highlighting)
	 * @since  		2.1.8
	 */
	define('QSSH', NULL);

	/**
	 * Boolean for enabling / disabling auto conversion of fields tied to a lookup table
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (Automatically joins primary table with any lookup tables and generates value-specific drop list for end users)
	 * @example		FALSE (Disables all lookup table joining and displays actual values from primary table instead)
	 * @since  		2.1.8
	 */
	define('QAJL', NULL);

	/**
	 * Boolean for enabling / disabling auto conversion of Enum field types
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (Automatically retrieves Enum values and displays them for end user convenience)
	 * @example		FALSE (Disables Enum values retrieval)
	 * @since  		2.1.8
	 */
	define('QAJE', NULL);

	/**
	 * Boolean for enabling / disabling auto conversion of set field types
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (Automatically retrieves Set values and displays them for end user convenience)
	 * @example		FALSE (Disables Set value retrieval)
	 * @since  		2.1.8
	 */
	define('QAJS', NULL);
	
	/**
	 * Boolean for enabling / disabling auto conversion of CSV field types
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (Automatically retrieves CSV values and joins them to respective lookup table)
	 * @example		FALSE (Disables CSV value retrieval)
	 * @since  		2.1.8
	 */	
	define('QAJC', NULL);
	
	/**
	 * Boolean for enabling / disabling auto conversion of boolean field types
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (Automatically replaces Boolean numeric values with more user-friendly values)
	 * @example		FALSE (Disables Boolean value conversion)
	 * @since  		2.1.8
	 */	
	define('QAJB', NULL);
	
	/**
	 * Boolean that determines if uploaded files will overwrite existing file names or be renamed to a unique name
	 * Default Web Interface Value Assigned: TRUE
	 *
	 * @var 		boolean
	 * @example		TRUE (Overwrite protection is in place. Files will NOT be overwritten. New serialized name will be created instead.)
	 * @example		FALSE (Files with matching names will be overwritten by latest version uploaded)
	 * @since  		2.1.8
	 */	
	define('QFUNQ', NULL);
	
	/**
	 * Default destination directory for central location of all file uploads. 
	 * Note that this directory MUST exist for files to be uploaded successfully.
	 * Default Web Interface Value Assigned: ''
	 *
	 * @var 		string
	 * @example		'uploads/'
	 * @example		'/myuploadedfiles/' 
	 * @since  		2.1.8
	 */		
	define('QFDST', NULL);
	
	/**
	 * File type limitation - limit files to specific types by specifying extensions in a 
	 * comma separated values (CSV) format
	 * Default Web Interface Value Assigned: ''
	 *
	 * @var 		string
	 * @example		'doc,docx,xls,txt'
	 * @example		'png,gif,jpeg,jpg,bmp'
	 * @since  		2.1.8
	 */		
	define('QFALL', NULL);
	
	/**
	 * Boolean that determines whether files known to be dangerous should be blocked by default. These 
	 * types of files are often vulnerable to exploits and would make a web server potentially vulnerable
	 * to attack if allowed to reside. We recommend setting this to TRUE for security reasons.
	 * Default Web Interface Value Assigned: ''
	 *
	 * @var 		boolan
	 * @example		TRUE (Prevent dangerous files from being uploaded and saved on the web server)
	 * @example		FALSE (Do not block known dangerous file types from being uploaded and saved)
	 * @since  		2.1.8
	 */		
	define('QFFOR', NULL);
	
	/**
	 * A comma separated list of values to be passed into the thumbnail generator. Note that any values 
	 * assigned for selection must already exist in the default list. This option simply lets you override 
	 * the default options by mandating a subset selection to be utilized by the end users. Any value
	 * over 150 will result in a proportional image rather than a square box.
	 * Default Web Interface Value Assigned: NULL
	 *
	 * @var 		string
	 * @example		75,125,800,1600
	 * @since  		2.1.8
	 */		
	define('QTHMBS', NULL);
	

/** End of file amplescaffolder_config.php **/
