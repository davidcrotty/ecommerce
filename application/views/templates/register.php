<?php

echo'
   <div class="container">
    <div class="row-lg-2">
        <div class="col-lg-3">
        <div class="panel panel-default custompanelactive">
            <div class="panel-body">
                <b>About You<span class="customright customtitle"> <i class="icon-chevron-right icon-medium"></i></span></b>
            </div>
        </div>
        
    </div>
        <div class="col-lg-3">
        <div class="panel panel-default custompanelinactive">
            <div class="panel-body">
                Billing information <span class="customright customtitle"> <i class="icon-chevron-right icon-medium"></i></span>
            </div>
        </div>
        </div>
        
        <div class="col-lg-3">
        <div class="panel panel-default custompanelinactive">
            <div class="panel-body">
                Summary <span class="customright customtitle"> <i class="icon-chevron-right icon-medium"></i></span>
            </div>
        </div>
        </div>
        
        <div class="col-lg-3">
        <div class="panel panel-default custompanelinactive">
            <div class="panel-body">
                Welcome <span class="customright customtitle"> <i class="icon-flag icon-medium"></i></span>
            </div>
        </div>
            </div>
        </div>
        <!-- End breadcrumbs -->
        <br>
        <div class="row-lg-3">
            <div class="col-lg-3">
                
            </div>
            <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>About you</b></h3>
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec mollis lectus. Fusce laoreet augue.</p>
                                <form action="register" method="post">';
                                foreach($form as $value)
                                {
                                    echo $value;
                                } 
                                echo '
                                
                                
                                <button type="submit" name="submission" value="aboutyou" class="btn btn-success">Next</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>';
?>