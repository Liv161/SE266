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
    <form style="text-align: center; margin-top: 2%" action="#" method="get">

        <fieldset>

            <legend><b>Search Data</b></legend>

            <label>Column:</label>

            <select name="colum">
                <option value="id">ID</option>
                <option value="projectName">Project Name</option>
                <option value="projectManager">Project Manager</option>
                <option value="projectCheckIn">Check In</option>
                <option value="projectCheckOut">Check Out</option>
            </select>

            <label>Keyword:</label>
            <input name="keyword" type="search" placeholder="Search...." />
            <input type="hidden" name="action" value="search" />
            <input type="submit" value="Search" />

            <input type="submit" name="action" value="Reset"/>

        </fieldset>

    </form>

</div>

