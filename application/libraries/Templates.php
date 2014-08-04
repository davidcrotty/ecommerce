<?php

class Templates {

    //TODO, add in so they may take in a boolean and return an error field or not

    public static function getPasswordInput($error) {
        if ($error) {
            return '                                <label for="passwordInput" style="color:red"> Password*</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password">
                                    <span class="input-group-addon">&#160;</span>
                                </div>';
        } else {
            return '                                <label for="passwordInput"> Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password">
                                    <span class="input-group-addon">&#160;</span>
                                </div>';
        }

    }

    public static function getRePasswordInput($error) {
        if ($error) {
            return '                                <label for="repasswordInput" style="color:red">Re-enter password*</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="passwordvalid" id="repasswordInput" placeholder="Re-enter password">
                                    <span class="input-group-addon">&#160;</span>
                                </div>';
        } else {
            return '                                <label for="repasswordInput">Re-enter password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="passwordvalid" id="repasswordInput" placeholder="Re-enter password">
                                    <span class="input-group-addon">&#160;</span>
                                </div>';
        }

    }

    public static function getUsernameInput($error) {
        if ($error) {
            return '<label for="usernameInput" style="color:red">Email address*</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username" id="usernameInput" placeholder="Email address">
                                    <span class="input-group-addon customEmailStyle">&#160;</span>
                                </div>';
        } else {
            return '<label for="usernameInput">Email address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username" id="usernameInput" placeholder="Email address">
                                    <span class="input-group-addon customEmailStyle">&#160;</span>
                                </div>';
        }

    }

    public static function getWarningHeader($error) {
        if ($error) {
            return '<br><div class="alert alert-danger" role="alert"><a href="#" class="alert-link">Please check the marked fields and submit again</a></div>';
        } else {
            return '';
        }
    }

    //take in type of data (query)
    public static function getProductBrand($data) {
        $html = array();

        foreach ($data as $value) {
            $temp = "<p class='customIndent ajaxFilter brand id='ajax" . $value['productbrand'] . "'><span>" . $value['productbrand'] . " (" . $value['Count'] . ")</span><span class='empty_fill'></span></p>";
            array_push($html, $temp);
        }

        return $html;
    }

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
     * Get available products for the list view
     */
    public static function getProductList($data)
    {
        $html = array();
        
            foreach ($data as $value) {
            $temp = ' <div class="panel panel-default">
        <div class="panel-body">
            <div class="row-lg-6">
                <div class="col-lg-6">
                    Image
                </div>
                <div class="col-lg-6">
                    '.$value->getProductName().' '.$value->getProductdescription().'
                </div>
            </div>
            <div class="row-lg-6">
                <div class="col-lg-6">
                    
                </div>
                <div class="col-lg-6">
                    <br>
                    <button type="submit" class="btn btn-success">Add to cart</button>
                </div>
            </div>
         </div>
        </div>';
            array_push($html, $temp);
     }

        return $html;        
    }
}
?>