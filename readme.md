<h3>The Class: A case study in Laravel</h3>

<p>This project is an exercise on CRUD operations and Elquent relationships using (hopefully) good practices in Laravel 5.8</p>
<p>The project involves the Teachers, Students, Courses relationships in a imaginary Class and the functionality around them, as well as database security and some data validation.</p>
<p>A complete management system is beyond the scope of this excercise, so the logic in many parts is incomplete (e.g. views and permisions according to roles or date/time validation) so the code will probably fail in some cases.</p>
<p>The main functionality includes:</p>
<ul>
    <li>CRUD operations on the Teachers, Students and Courses tables via their respective models</li>
    <li>Basic back end validation with custom Requests</li>
    <li>Basic front end validation with HTML and Boostrap classes</li>
    <li>Some assynchronus database manipulation. Student's grades are passed on the front end with AJAX calls.
</ul>
<p>The installation includes custom factories and seeds, so don't forget to run db:seed if you need lots of data!</p>
<p>The installation uses Bootstrap imported with npm and the JQuery and Select2 libraries imported via cdn for AJAX and select operations</p>
    
