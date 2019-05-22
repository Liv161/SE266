
<!-- posts to the parent file which included it -->

<?php



?>

<div class="container">
    <form style="text-align: center; margin-top: 2%" action="#" method="get">

        <fieldset>

            <legend><b>Sort Data</b></legend>
             <!-- Note: the radio button name attributes are the same -->
            <input type="radio" name="order" value="ASC" />
            <label>Ascending</label>
            <input type="radio" name="order" value="DESC" />
            <label>Descending</label>
            &nbsp;        
            <label>Column</label>  
            <!-- the selected option value is assigned 
            to the attribute name of <select> -->
             <select name="colum">
                <option value="id">ID</option>
                <option value="projectName">Project Name</option>
                <option value="projectManager">Project Manager</option>
                <option value="projectCheckIn">Check In</option>
                <option value="projectCheckOut">Check Out</option>
            </select>
            <input type="hidden" name="action" value="sort" />
            <input type="submit" value="Sort" />

            <input type="submit" name="action" value="Reset"/>

        </fieldset>


    </form>
    
</div>