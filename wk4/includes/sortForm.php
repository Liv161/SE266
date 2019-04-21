
<!-- posts to the parent file which included it -->

<?php

// include_once "./functions/dbData.php";

?>

<div class="container">
    <form action="#" method="get">

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
                <option value="corp">Corp</option>
                <option value="incorp_dt">Date</option>
                <option value="email">Email</option>
                <option value="zipcode">Zip Code</option>
                <option value="owner">Owner</option>
                <option value="phone">Phone</option>
            </select>
            <input type="hidden" name="action" value="sort" />
            <input type="submit" value="Sort" />

            <input type="submit" name="action" value="Reset"/>

        </fieldset>


    </form>
    
</div>