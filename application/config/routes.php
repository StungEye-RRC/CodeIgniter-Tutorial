<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'blog';

$route['blogs'] = 'blog/index';
$route['blogs/new'] = 'blog/new_blog';
$route['blogs/create']['POST'] = 'blog/create';
$route['blogs/(:num)/delete']['POST'] = 'blog/delete_blog/$1';
$route['blogs/(:num)/(:any)'] = 'blog/show/$1/$2';
//$route['blogs/(:num)']['POST'] = 'blog/update/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// REST Representational State Transfer
// RESTfull Routing
// NAME   - VERB - URL                - Description
// index  - GET  - /blogs             - Shows the collection (all blogs)
// show   - GET  - /blogs/(:num)      - Show an individual member. (One blog by id)
// new    - GET  - /blogs/new         - Form for creating new member. (New blog form)
// create - POST - /blogs/create      - Receives POSTed data and creates new member in db.
// edit   - GET  - /blogs/(:num)/edit - Form for editing a individual member. (Edit a blog by id)
// update - POST - /blogs/(:num)      - Receives POSTed data and updates member. (Update blog by id)
// delete - POST - /blogs/(:num)/delete - Deletes an individual member. (Delete blog by id)


// /blogs/12/comments/3  
// /blogs/(:num)/comments/(:num)


