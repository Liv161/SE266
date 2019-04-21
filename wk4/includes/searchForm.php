<?php

/* 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- posts to the parent file which included it -->
<div class="container">
    <form action="#" method="get">

        <fieldset>

            <legend><b>Search Data</b></legend>

            <label>Column:</label>

            <select name="colum">
                <option value="id">ID</option>
                <option value="corp">Corp</option>
                <option value="incorp_dt">Date</option>
                <option value="email">Email</option>
                <option value="zipcode">Zip Code</option>
                <option value="owner">Owner</option>
                <option value="phone">Phone</option>
            </select>

            <label>Keyword:</label>
            <input name="keyword" type="search" placeholder="Search...." />
            <input type="hidden" name="action" value="search" />
            <input type="submit" value="Search" />

            <input type="submit" name="action" value="Reset"/>

        </fieldset>

    </form>

</div>

