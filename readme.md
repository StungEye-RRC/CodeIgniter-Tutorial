# Code Igniter Tutorial

Steps followed by this tutorial:

* Extracted CodeIgniter to the htdocs folder.
* Added the base url to the config file.
* Added the development database details to the database config file.
* Created a blogs table using phpmyadmin:

    CREATE TABLE blogs (
      id int(11) NOT NULL AUTO_INCREMENT,
      title varchar(255) NOT NULL,
      permalink varchar(255) NOT NULL,
      content text NOT NULL,
      PRIMARY KEY (id),
      KEY permalink (permalink)
    );

* Renamed the Welcome controller to Blog and adjusted the routes.
* Created a Blog model:

    class News_model extends CI_Model {
        public function __construct()
        {
                $this->load->database();
        }
    }

* Built the blog index functionality. (Model, controller, views, routes)
* Built the blog show (by id) functionality. (Model, controller, views, routes)
* Built the blog show (by permalink) functionality.
* Built the blog create functionality. (Model, controller, views, routes)
* Added header and footer view partials (plus bootstrap).
* Used an .htaccess file to remove the index.php from the site urls.
