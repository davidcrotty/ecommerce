<?php

echo '
            <div class="container">
    <div class="row-lg-2">
        <div class="col-lg-3">
        <div class="panel panel-default custompanelactive">
            <div class="panel-body">
                About You<span class="customright customtitle"> <i class="icon-chevron-right icon-medium"></i></span>
            </div>
        </div>
        
    </div>
        <div class="col-lg-3">
        <div class="panel panel-default custompanelactive">
            <div class="panel-body">
                <b>Billing information <span class="customright customtitle"> <i class="icon-chevron-right icon-medium"></i></span></b>
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
            <div class="col-lg-6">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Billing address</b></h3>
                        </div>
                        <div class="panel-body">
                            <br>
                            <br>
                            <form role="form">';
                            
                            foreach($form as $value)
                            {
                                echo $value;
                            }
                            echo '<div class="firstnamevalidation">
                                </div>
                                <br>
                                    <label for="usernameInput">Last name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  placeholder="Last name">
                                    <span class="input-group-addon">T</span>
                                </div>
                                <div id="lastnamevalidation">
                                </div>                                
                                <br>
                                <br>
                                    <label for="usernameInput">Address line 1</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Address line 1">
                                    <span class="input-group-addon">T</span>
                                </div>
                                <div id="address1validation">
                                </div>                                
                                <br>
                                    <label for="usernameInput">Address line 2</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Address line 2">
                                    <span class="input-group-addon">T</span>
                                </div>
                                <div id="address2validation">
                                </div> 
                                <br>
                                <br>
                                    <label for="usernameInput">City</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="City">
                                    <span class="input-group-addon">T</span>
                                </div>
                                <div id="cityvalidation">
                                </div> 
                                <br>
                                    <label for="usernameInput">Postcode</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Postcode">
                                    <span class="input-group-addon">T</span>
                                </div>
                                <div id="cityvalidation">
                                </div> 
                            
                        </div>
                    </div>
                    </form>
            </div> 
            <div class="col-lg-6">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Delivery address</b></h3>
                        </div>
                        <div class="panel-body">
                        <form role="form" id="deliverySame">
                            <label class="checkbox customright">
                                <input type="checkbox" name="keywords" value="__option__">Same as delivery address
                            </label>
                        </form>
                            <br>
                            <br>
                            <form role="form" id="deliveryForm">
                            <label for="usernameInput">Address line 1</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  placeholder="Address line 1">
                                    <span class="input-group-addon">T</span>
                                </div>
                                <br>
                                    <label for="usernameInput">Address line 2</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Address line 2">
                                    <span class="input-group-addon">T</span>
                                </div>
                                <br>
                                <br>
                                    <label for="usernameInput">City</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="City">
                                    <span class="input-group-addon">T</span>
                                </div>
                                <br>
                                    <label for="usernameInput">Postcode</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Postcode">
                                    <span class="input-group-addon">T</span>
                                </div>
                            
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                            <div class="customcenter">
                            <span><button type="submit" name="back" class="btn btn-danger customformpad">Back</button><button type="submit" name="submit "class="btn btn-success customformpad">Next</button</span></div>
                            </form>
                        </div>
                    </div>
            </div> 
        </div>
        
        <!-- end input -->';

?>