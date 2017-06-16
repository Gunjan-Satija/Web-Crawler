# Web Crawler
This is a web crawler made in php. It crawls all the sites traversed through a given web page in depth first manners. It gets its data into an array first and then into the database 5 at a time.
Parser.php is the main source code that you need to execute. It makes use of Simple_DOM_Parser.
sitemap.xml is the sitemap of a website - johnsonwatch.com
you can run php through any local server that supports php.
I have used XAMPP Server.
Place your files in C:\xampp\htdocs
And you are ready to go.
I am dumping 5 urls with titles to database at a time.
You can store anything that you see as relevant such as 'meta tags'.
You can also change max execution time in php.ini file.
