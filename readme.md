This framework is really easy to use and gives you a good start when building new projekts. Read this file to understand the structure and how to use it.

There are 3 folders that handles different things from the absolute root of this framework.

*WEBROOT folder contains the new files you make. Pagecontrollers. This is where you have all your images,css and
javascript files that you need. Also some basic files that you might need such as .htaccess file,favicon.ico,404 error page
sitemap,robots.txt and humans.txt. You might want to delete those files if you dont need them. The config file is the file
you include at the top of all your new created pagecontrollers. This file will set some important settings that you might need
It will define the paths to your src and theme folder. The config file will create the Edax variable which will contain
the final data you print out. You need to edit this file and set the right properties for your program. The only file it will include 
is the bootstrap.php file which is in the src folder. More explanation of this file further down.
At the bottom of your new pagecontroller the theme rendering phase will start by including the theme path which is defined in the
config file. To understand all of this you need to look at the example pagecontroller: index.php.

*SRC folder will contain all classes you make and a php file with useful functions(bootstrap.php). 
The most important function in this file is the one
which automatically runs and include your class files when you write for example 'new CClass()' in a pagecontroller. You dont have to 
include classes you make when using this functionality. It is important though when you make a new class that you 
create an own folder for the classfile and also name the folder,the file and the class exactly the same and offcourse put it in the src folder.
2 classes will be in this folder as default. One which set up a connection using pdo to a database. You need to edit the config file for the right
settings to be able to connect. When you need a connection you simply write down for example `$database = new CDatabase($Edax['database'])` and by doing this you can access functions int he class which will insert/update/delete things in your database. You need to check this file to understand more.

*THEME folder will handle the rendering sequence of your program and contains all the html structure. The first step is to
extract the Edax variable so all of the array keys will be accessible by their own variables in the last file that will be included and
display the data: index.tpl.php. Before this a new functions.php file will be included. Here you can write down functions
that is needed for the theme. You need to look into those files to understand as well.

The process
For example:   index.php as your pagecontroller will work like this

index.php -> config.php -> ../src/bootstrap.php
 |
../theme/render.php -> functions.php -> index.tpl.php -> (Display the page in webbrowser)