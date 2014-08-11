<?php

class Templates {

    //template class, for retreiving/foreaching through data based on data fed in/validation results
    //TODO, add in so they may take in a boolean and return an error field or not

    /*
     * Gets the correct password input field based on validation result
     * */
    public static function getPasswordInput($error) {
        if ($error) {
            return '                                <label for="passwordInput" style="color:red"> Password*</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password">
                                    <span class="input-group-addon">&#160;</span>
                                </div>
                                <br>';
        } else {
            return '                                <label for="passwordInput"> Password</label>
                                <div class="input-group" id="passwordInputDiv">
                                    <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password">
                                    <span class="input-group-addon">&#160;</span>
                                </div>
                                <br>';
        }

    }

    /*
     * Gets the correct repassword input field based on validation result
     * */
    public static function getRePasswordInput($error) {
        if ($error) {
            return '                                <label for="repasswordInput" style="color:red">Re-enter password*</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="passwordvalid" id="repasswordInput" placeholder="Re-enter password">
                                    <span class="input-group-addon">&#160;</span>
                                </div>
                                <br>';
        } else {
            return '                                <label for="repasswordInput">Re-enter password</label>
                                <div class="input-group" id="repasswordInputDiv">
                                    <input type="password" class="form-control" name="passwordvalid" id="repasswordInput" placeholder="Re-enter password">
                                    <span class="input-group-addon">&#160;</span>
                                </div>
                                <br>';
        }

    }

    /*
     * Gets the correct username input field based on validation result
     * */
    public static function getUsernameInput($error) {
        if ($error) {
            return '
            <br><label for="usernameInput" style="color:red">Email address*</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username" id="usernameInput" placeholder="Email address">
                                    <span class="input-group-addon customEmailStyle">&#160;</span>
                                </div>
                                <br>';
        } else {
            return '<br><label for="usernameInput">Email address</label>
                                <div class="input-group" id="usernameInputDiv">
                                    <input type="text" class="form-control" name="username" id="usernameInput" placeholder="Email address">
                                    <span class="input-group-addon customEmailStyle">&#160;</span>
                                </div>
                                <br>';
        }

    }

    /*
     * Deliver warning header telling user entered data in wrong
     * */
    public static function getWarningHeader($error) {
        if ($error) {
            return '<br><div class="alert alert-danger" role="alert"><a href="#" class="alert-link">Please check the marked fields and submit again</a></div>';
        } else {
            return '';
        }
    }

    /*
     * Generates the Brand part of product sidebar
     * */
    public static function getProductBrand($data) {
        $html = array();

        foreach ($data as $value) {
            $temp = "<p class='customIndent ajaxFilter brand id='ajax" . $value['productbrand'] . "'><span>" . $value['productbrand'] . " (" . $value['Count'] . ")</span><span class='empty_fill'></span></p>";
            array_push($html, $temp);
        }

        return $html;
    }

    /*
     * Generates the Processor part of product sidebar
     * */
    public static function getProductProcessor($data)
    {
        $html = array();

        foreach ($data as $value) {
            $temp = "<p class='customIndent ajaxFilter processor id='ajax" . $value['processor'] . "'><span>" . $value['processor'] . " (" . $value['total'] . ")</span><span class='empty_fill'></span></p>";
            array_push($html, $temp);
        }

        return $html;
    }

    /*
     * Get available products for the list view, note JSON response will only take associative arrays
     */
    public static function getProductList($data)
    {
        
        $html = array();
            
            $index = 0;
            foreach ($data as $value) { 
            $temp = ' <div class="panel panel-default">
        <div class="panel-body">
            <div class="row-lg-6">
                <div class="col-lg-5">

                    <img src='.base_url()."/assets/img/".$value->getProductimg().'>
                </div>
                <div class="col-lg-4">
                    '.$value->getProductName().'<br>'.$value->getProductdescription().'
                </div>
                <div class="col-lg-2">
                    <h3>&#163;'.$value->getProductPrice().'</h3>
                </div>
            </div>
            <div class="row-lg-6">
                <div class="col-lg-5">
                    
                </div>
                <div class="col-lg-4">
                    <br>
                    <button type="submit" class="btn btn-success">Add to cart</button>
                </div>
            </div>
         </div>
        </div>';
            //array_push($html, $temp);
            $html[$index] = $temp;
            $index++;
     }
        return $html;        
    }
}
?>